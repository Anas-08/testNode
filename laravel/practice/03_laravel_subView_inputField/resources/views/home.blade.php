@include('common.header')
<h1>Learning Laravel 11</h1>
<br>
<br>
<hr>
<br>
<br>

<h1>Route Page</h1>

<ul>
    <li><a href="/user/{name}">User Page</a></li>
    <li><a href="/about">About Page</a></li>
</ul>

<hr>
<h1>Route with Controller</h1>
<ul>
    <li><a href="/user-home/{name}">User Page</a></li>
    <li><a href="/user-about">About Page</a></li>
    <li><a href="/admin-login">Admin login Page (nested, in case of folder)</a></li>
    {{-- <li><a href="/admin-signup">Admin sign Page (no such route)</a></li> --}}
</ul>

<br>
<hr>
<br>

<h1>Blade Template</h1>
<ul>
    <li><a href="blade-1">Blade Template Test</a></li>
</ul>

<br>
<hr>
<br>


<h1>Sub View</h1>
<ul>
    <li><a href="view-1">Sub View Test</a></li>
</ul>

<br>
<hr>
<br>

<h1>Components</h1>
<ul>
    <li><a href="/comp1">components Example</a></li>
</ul>

<br>
<hr>
<br>

<h1>Forms</h1>
<ul>
    <li><a href="/form1">Form Example</a></li>
</ul>
