// jika halaman tidak ada
// membuat login system

root.err = function(){
    console.log('error');
}


root.loginData = null;

root.verify = function(a){

    // make verify
    if (root.loginData === null) {
        console.log(a);
        rootCall('page/login', arguments);
    }else{
        return root.loginData;
    }

}


root.get('/home', function(){
    rootCall('page/home', arguments);
})

root.get('/galery', function(){
    rootCall('page/galery', arguments);
})

root.get('/website', function(){
    rootCall('page/web', arguments);
})

root.get('/about', function(){
    rootCall('page/about', arguments);
})

root.get('/contact', function(){
    rootCall('page/contact', arguments);
})

root.get('/order', function(){
    rootCall('page/contact', arguments);
}, true)


// halaman pertama kali di load
root.start('/home');
