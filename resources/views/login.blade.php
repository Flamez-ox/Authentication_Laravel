@include ('header')


<form method="POST" action="{{ route ('login_submit') }}">
    @csrf
  <div class="container">
    <h1>login</h1>
    <br>

    <label ><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required><br>
    <br>
    <label ><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"  required><br>
    <br>
    

    <button type="submit" >Login</button>
  </div>
  
  <div class="container signin">
    <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a>.</p>
  </div>
</form>