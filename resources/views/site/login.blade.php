<form action="{{url('login')}}" method="post">
    @csrf
    <label for="fname">username</label><br>
    <input type="text"  name="username"><br>

    <label for="lname">password:</label><br>
    <input type="text" name="password"><br><br>

    <input type="submit" value="Submit">
  </form> 