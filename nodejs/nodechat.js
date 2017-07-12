var io = require('socket.io').listen(8082,{
  'log level':1
});

usernames = {};
hashBucket = {};

io.sockets.on('connection', function(socket){
    socket.emit('startup', usernames);
    socket.on('room', function(room) {
        socket.join(room);
    });

    socket.on('newMessage', function (data) {
        var sender = socket.username;
        var message = data.message;
        io.sockets.in(data.chathash).emit('updateChat',{name: sender, msg: data});
    });

    socket.on('title', function (data) {
        var sender = socket.username;
        var message = data.message;
        io.sockets.in(data).emit('title',data);
    });
    
    socket.on('userConnected', function(data){
        var isoDateTime = new Date();
        socket.username = data.username;
        data['status'] = 'online';
        data['isoDateTime'] = isoDateTime.toISOString();
        usernames[data.username] = data;
        hashBucket[data.username] = socket.id;
        io.sockets.emit('newUserConnected', usernames);
    });
    
    socket.on('disconnect', function(){
        // remove the username from global usernames list
        delete usernames[socket.username];
        delete hashBucket[socket.username];

        // update list of users in chat, client-side
        io.sockets.emit('updateUsers', usernames);
    });
});