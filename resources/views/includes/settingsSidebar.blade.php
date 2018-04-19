<div id="heading">
	    <h1>Settings</h1>
</div>
<aside>
	<div class="menu">
	    <nav>
		<ul class="aside-menu">
		    <li class="test"><a href="#">Products Managment</a></li>
			 <div class="dropdown-container" style="display:none">
			    <li><a href="#">Link 1</a></li>
			    <li><a href="#">Link 2</a></li>
			    <li><a href="#">Link 3</a></li>
			 </div>
		    <li><a href="#">Service Managment</a></li>
		    <li><a href="#">Genral Settings</a></li>
		    <li><a href="{{route('announcement.index')}}">Announcement</a></li>
		    <li><a href="{{route('users.index')}}">User Managment</a></li>
		    <li><a href="#">Logs</a></li>	
		</ul>
	    </nav>
	</div>
</aside>

<script>

var dropdown = document.getElementsByClassName("test");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}


</script>

