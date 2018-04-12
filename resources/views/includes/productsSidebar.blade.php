<div id="heading">
	    <h1>Products</h1>
</div>
<aside>
	    <nav>
		<ul class="aside-menu">
		    <li id="additives" ><a href="{{route('additives.index')}}">Additives</a></li>
		    @if (Request::is('products/additives/*')||Request::is('products/additives'))
		    <script>
		    var c = document.getElementById('additives');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="aquariums"><a href="{{route('aquariums.index')}}">Aquariums</a></li>
		    @if (Request::is('products/aquariums/*')||Request::is('products/aquariums'))
		    <script>
		    var c = document.getElementById('aquariums');
		    c.className +=" active";
		    </script>
		    @endif	
		    <li id="chillers"><a href="{{route('chillers.index')}}">Chillers</a></li>
		    @if (Request::is('products/chillers/*')||Request::is('products/chillers'))
		    <script>
		    var c = document.getElementById('chillers');
		    c.className +=" active";
		    </script>
		    @endif	
		    <li id="corals"><a href="{{route('corals.index')}}">Corals</a></li>
		    @if (Request::is('products/corals/*')||Request::is('products/corals'))
		    <script>
		    var c = document.getElementById('corals');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="filters"><a href="{{route('filters.index')}}">Filters</a></li>
		    @if (Request::is('products/filters/*')||Request::is('products/filters'))
		    <script>
		    var c = document.getElementById('filters');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="fish"><a href="{{route('fish.index')}}">Fish</a></li>
		    @if (Request::is('products/fish')||Request::is('products/fish/*'))
		    <script>
		    var c = document.getElementById('fish');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="food"><a href="{{route('food.index')}}">Food</a></li>
		    @if (Request::is('products/food')||Request::is('products/food/*'))
		    <script>
		    var c = document.getElementById('food');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="heaters"><a href="{{route('heaters.index')}}">Heaters</a></li>
		    @if (Request::is('products/heaters')||Request::is('products/heaters/*'))
		    <script>
		    var c = document.getElementById('heaters');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="lightings"><a href="{{route('lightings.index')}}">Light</a></li>
		    @if (Request::is('products/lightings')||Request::is('products/lightings/*'))
		    <script>
		    var c = document.getElementById('lightings');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="sterilizers"><a href="{{route('sterilizers.index')}}">Sterilizers</a></li>
		    @if (Request::is('products/sterilizers')||Request::is('products/sterilizers/*'))
		    <script>
		    var c = document.getElementById('sterilizers');
		    c.className +=" active";
		    </script>
		    @endif
		</ul>
	    </nav>
</aside>
