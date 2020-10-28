function(){
    document.getElementById('root').innerHTML = `
        <div class="form-login transition">
            <form id="login">
                <label for="username"> Username </label>
                <input type="text" id="username" name="username" />
                <label for="password"> Password </label>
                <input type="password" id="password" name="password" >
                <div style="padding: 10px 0;">
                    <button type="submit" class="btn">Login</button>
                    <button type="button" class="btn waves-effect">register</button>
                    <button type="button" root="/home" class="btn waves-effect">kembali</button>
                </div>
            </form>
        <div>
    `;
}
