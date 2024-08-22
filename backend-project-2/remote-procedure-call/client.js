const net = require('net');

const requestId = Math.floor(Math.random() * 100000);
const request = {
  method: 'sort',
  params: ['my', 'name', 'is', 'ikumo', 'takahashi'],
  param_types: ['str'],
  id: requestId,
};

const SERVER_HOST = 'localhost';
const SERVER_PORT = 11000;

const client = net.createConnection(SERVER_PORT, SERVER_HOST, () => {
  console.log('Connected to server');
  client.write(JSON.stringify(request));
});

client.on('data', (data) => {
  console.log('Received: ', data.toString());
  client.end();
});

client.on('end', () => {
  console.log('Disconnected from server');
});
