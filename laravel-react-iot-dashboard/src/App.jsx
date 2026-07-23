import { useState, useEffect } from 'react';
import axios from 'axios';
import { LineChart, Line, XAxis, YAxis, CartesianGrid, Tooltip, Legend, ResponsiveContainer } from 'recharts';

function App() {
  const [chartData, setChartData] = useState([]);
  const [loading, setLoading] = useState(true);

  const fetchSensorData = () => {
    // লারাভেল লোকালহোস্ট লাইভ চার্ট এপিআই এন্ডপয়েন্ট
    axios.get('http://127.0.0.1:8000/api/sensor-data')
      .then(response => {
        setChartData(response.data);
        setLoading(false);
      })
      .catch(error => {
        console.error("API Connection Error:", error);
        setLoading(false);
      });
  };

  useEffect(() => {
    fetchSensorData();
    // প্রতি ৩ সেকেন্ড পরপর স্বয়ংক্রিয়ভাবে ব্যাকএন্ড থেকে নতুন ডেটা রিড করার পোলিং
    const interval = setInterval(fetchSensorData, 3000);
    return () => clearInterval(interval);
  }, []);

  return (
    <div style={{ padding: '30px', fontFamily: 'Arial, sans-serif', backgroundColor: '#f4f6f9', minHeight: '100vh' }}>
      <div style={{ maxWidth: '1000px', margin: '0 auto', backgroundColor: '#fff', padding: '20px', borderRadius: '10px', boxShadow: '0 4px 6px rgba(0,0,0,0.1)' }}>
        <h1 style={{ textAlign: 'center', marginBottom: '5px' }}>IoT Real-Time Weather Dashboard</h1>
        <p style={{ textAlign: 'center', color: '#666', marginBottom: '30px' }}>Live Data Feed from Laravel API Server</p>

        {loading ? (
          <h3 style={{ textAlign: 'center', color: '#007bff' }}>Fetching Telemetry from Server...</h3>
        ) : (
          <div style={{ width: '100%', height: 400 }}>
            <ResponsiveContainer>
              <LineChart data={chartData}>
                <CartesianGrid strokeDasharray="3 3" stroke="#eee" />
                <XAxis dataKey="id" />
                <YAxis />
                <Tooltip />
                <Legend />
                {/* তাপমাত্রা লাইন (লাল) */}
                <Line type="monotone" dataKey="temperature" name="Temperature (°C)" stroke="#ef4444" strokeWidth={3} animationDuration={500} />
                {/* আর্দ্রতা লাইন (নীল) */}
                <Line type="monotone" dataKey="humidity" name="Humidity (%)" stroke="#3b82f6" strokeWidth={3} animationDuration={500} />
              </LineChart>
            </ResponsiveContainer>
          </div>
        )}
      </div>
    </div>
  );
}

export default App;
