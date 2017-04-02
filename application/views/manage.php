
<a href="/manage/reboot"><input type="button" value="Reboot"></a>
<a href="/manage/register"><input type="button" value="Register"></a>

<h4>Built Robots</h4>
<table class="table">
    <tr>
        <th>ID</th> 
        <th>Part 1</th>
        <th>Part 2</th>
        <th>Part 3</th>
        <th></th>
    </tr>
    {display_robots}
</table>

<form role="form" action="/manage/sellrobot" method="post">
    {frobot}
    {zsubmit}
</form>