<?php

echo '
    <div id="leftcolumn">
<div class="field" align="right">
<label>Username</label>
</div>
<div class="field" align="right">
<label>Password</label>
</div>
<div class="field" align="right">
<label>Password Again</label>
</div>
<div align="right" class="fieldP">
<label>Email</label>
</div>
</div><!--leftcolumn-->

<form action="register.php" method="post">
<div id="rightcolumn">
<div class="field"><input name="username" type="text" id="username" value="" /></div>
<div class="field"><input name="password" type="password" id="password" /></div>
<div class="field"><input name="password_again" type="password" id="password_again" /></div>
<div class="fieldP">
  <input name="email" type="text" id="email" value="" />
</div>
</div><!--rightcolumn-->
    
<div id="footspace"></div>
<div id="spt">
<div align="center">error message</div>
<div align="center" id="th" >
<ul id="na"><input name="input" type="submit" value="register" /> 
 or <a href="">login</a>
</ul>
</div> 
</div> <!--spt-->'

?>

