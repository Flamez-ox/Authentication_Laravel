@include ('header')




<form method="POST" action="{{ route('register_submit') }}">
    @csrf
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <br>

    <label ><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" required><br>
    <br>
    <label ><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required><br>
    <br>
    <label ><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"  required><br>
    <br>
    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password_repeat" required><br>
    <hr>
    

    <button type="submit" >Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="{{ route('login') }}">Sign in</a>.</p>
  </div>
</form>
