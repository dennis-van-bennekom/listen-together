const http = require('http');
const socket = require('socket.io');
const app = http.createServer();
const io = socket(app);

io.on('connection', socket => {
    socket.on('update', ({ id, track, name }) => {
        if (socket.room && socket.room !== id) {
            console.log('ey');
            socket.leave(socket.room);
        }

        socket.room = id;
        socket.join(id);

        socket.name = name;
        socket.track = track;
    })
});

app.listen(3000);
