function(a, b){


    document.getElementById('root').innerHTML = /*html*/`
<div class="col s12 m12 l12 transition2">
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col s12 m12 l6 center">
                    <img class="responsive-img" src="./asset/gambar/bg.jpg" alt="">
                    <p style="text-align:left;">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="col s12 m12 l6">
                    <form id="save" data-table="">
                        <label for="nama_lengkap"> Nama Lengkap </label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" />
                        <label for="telp"> Telephone </label>
                        <input type="text" id="telp" name="telp" >
                        <label for="email"> Email </label>
                        <input type="text" id="email" name="email" >
                        <label for="pesan"> Pesan </label>
                        <textarea type="text" id="pesan" name="pesan" ></textarea>
                        <div style="padding: 10px 0;">
                            <button type="submit" class="btn">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
`;
}
