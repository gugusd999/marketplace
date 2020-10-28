var  times= "";

if (mytimes != undefined) {
  times = '?v='+mytimes;
}

function callPage(a) {
  axios.get(a+'.js'+times).then(function(res){
      rootPageData[a] = res.data;
    }, function(error) {
  })
}


const rootCall = async function (a, b){

  try {
    var res = await axios.get(a+'.js'+times);

    if (typeof res.data === "string") {
      eval(
          'const funcCall = '+res.data+`
          funcCall.apply(null, b);`
      );
      setTimeout(function(){
        document.querySelectorAll('.transition').forEach(function(event){
          let className = event.getAttribute('class');
          className = className.replace(/transition/g, '');
          event.setAttribute('class', className);
        })
        document.querySelectorAll('.transition2').forEach(function(event){
          let className = event.getAttribute('class');
          className = className.replace(/transition2/g, '');
          event.setAttribute('class', className);
        })
      },1500);
    }
  } catch (error) {
      let html = `
      <span id="error-db-connection" class="body-error-message">please check your connection and refres</span>
      `;
      document.body.innerHTML += html;
      setTimeout(()=>{
          document.getElementById('error-db-connection').remove();
          rootCall(a, b);
      },3600)
  }

  // if (rootPageData[a] == undefined) {
  //   axios.get(a+'.js'+times).then(function(res){
  //       eval(
  //           'const funcCall = '+res.data+`
  //           funcCall.apply(null, b);`
  //       );
  //       rootPageData[a] = res.data;
  //   }, function(error) {
  //
  //     let html = `
  //         <span class="body-error-message" onclick="this.remove()">please check your connection and refres</span>
  //     `;
  //
  //     document.body.innerHTML += html;
  //
  //   })
  // }else{
  //   eval(
  //       'const funcCall = '+rootPageData[a]+`
  //       funcCall.apply(null, b);`
  //   );
  //   callPage(a);
  // }
}
var root = {}
// data rooting
root.data = {}
root.verifydata = {}
root.verifydata.data = {}

root.navSelect = function(a){
    $("body .navigation > button[root]").removeClass("active");
    $("body .navigation > button[root='"+a.replace(/\#/g,"")+"']").attr("class", "active");
}

root.get = function (a, func, verify = false){
    root.data['#'+a] = func;
    root.verifydata.data['#'+a] = verify;
}
root.start = function(a){
    var location = window.location;
    if(location.hash != ""){
        var link = location.hash;
        var target = location.hash;

        var rootKey =  Object.keys(root.data);
        rootKey = rootKey.filter(function(item){
            if(target.indexOf(item) != -1){
                return item;
            }
        })[0];
        target = target.replace(rootKey, "").split("/");
        target.shift();
        window.location.hash = link;
        if(root.data[rootKey] != undefined){
            if (root.verifydata.data[rootKey] === true) {
                if (root.verify(rootKey) != false){
                    root.verify(rootKey)
                } else{
                    root.data[rootKey].apply(null, target);
                    root.navSelect(link);
                }
            }else if(root.verifydata.data[rootKey] === false){
                root.data[rootKey].apply(null, target);
                root.navSelect(link);
            }
        }else{
            root.err();
        }
    }else{
        location.hash = "#"+a;
        var link = location.hash;
        var target = location.hash;
        var rootKey =  Object.keys(root.data);
        rootKey = rootKey.filter(function(item){
            if(target.indexOf(item) != -1){
                return item;
            }
        })[0];
        target = target.replace(rootKey, "").split("/");
        target.shift();

        window.location.hash = link;
        if(root.data[rootKey] != undefined){
            if (root.verifydata.data[rootKey] === true) {
                if (root.verify(rootKey) != false){
                    root.verify(rootKey)
                } else{
                    root.data[rootKey].apply(null, target);
                    root.navSelect(link);
                }
            }else if(root.verifydata.data[rootKey] === false){
                root.data[rootKey].apply(null, target);
                root.navSelect(link);
            }
        }else{
            root.err();
        }
    }
}
// how about parameter ???....

// rootcall

window.onhashchange = function() {

    var link = location.hash;
        var target = location.hash;

        var rootKey =  Object.keys(root.data);
        rootKey = rootKey.filter(function(item){
            if(target.indexOf(item) != -1){
                return item;
            }
        })[0];

        target = target.replace(rootKey, "").split("/");

        target.shift();

        window.location.hash = link;
        if(root.data[rootKey] != undefined){
            if (root.verifydata.data[rootKey] === true) {
                if (root.verify(rootKey) != false){
                    root.verify(rootKey)
                } else{
                    root.data[rootKey].apply(null, target);
                    root.navSelect(link);
                }
            }else if(root.verifydata.data[rootKey] === false){
                root.data[rootKey].apply(null, target);
                root.navSelect(link);
            }
        }else{
            root.err();
        }

}

// gunakan jquery untuk mengakses button
// yang merupakan hasil dari template request

$('body').on('click','[root]', function(event){
    event.preventDefault()

    document.querySelectorAll('[root]').forEach((item) => {
        item.setAttribute('class', '')
    })

    event.target.setAttribute('class', 'active');

    var link = '#'+event.target.getAttribute('root');
    var target = '#'+event.target.getAttribute('root');

    var rootKey =  Object.keys(root.data);

    rootKey = rootKey.filter(function(item){
        if(target.indexOf(item) != -1){
            return item;
        }
    })[0];

    target = target.replace(rootKey, "").split("/");

    target.shift();

    window.location.hash = link;
    if(root.data[rootKey] != undefined){
        if (root.verifydata.data[rootKey] === true) {
            if (root.verify(rootKey) != false){
                root.verify(rootKey)
            } else{
                root.data[rootKey].apply(null, target);
                root.navSelect(link);
            }
        }else if(root.verifydata.data[rootKey] === false){
            root.data[rootKey].apply(null, target);
            root.navSelect(link);
        }
    }else{
        root.err();
    }
})
