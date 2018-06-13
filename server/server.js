const http = require('http');
const socket = require('socket.io');
const app = http.createServer();
const io = socket(app);

io.on('connection', socket => {
    socket.on('update', ({ id, artist, track, name }) => {
        if (socket.room !== id) {
            socket.leave(socket.room);

            socket.room = id;
            socket.name = name;
            // socket.playing = artist + ' - ' + track;

            socket.join(id, () => {
                console.log(name + ' joined ' + id);


            });
        }
    })
});

app.listen(3000);
