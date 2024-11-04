@include('common.header')
<h1>sub view Example</h1>

{{-- @includeIf('common.test', ['page'=> 'inner page test, testing, tested']) --}}
@includeIf('common.inner', ['page'=> 'inner page test, testing, tested'])
<ul>
    <li><a href="/">Back</a></li>
</ul>