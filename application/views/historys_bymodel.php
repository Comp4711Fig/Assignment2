
<a href="/history/bydatetime/page/1"><input type="button" value="Order by datetime"/></a>
<a href="/history/byrobotmodel/page/1"><input type="button" value="Order by robot model"/></a>

{pagination}
<table class="table">
    <tr>
        <th>Transaction</th>
        <th>Robot Line</th>
        <th>Robot Model</th>
        <th>Plant</th>
        <th>Action</th>        
        <th>Quantity</th>   
        <th>Amount</th>   
        <th>Time</th>  
    </tr>
    {display_historys}
    <tr>
        <td>{seq}</td>
        <td>{robotLine}</td>
        <td>{model}</td>
        <td>{plant}</td>
        <td>{action}</td>
        <td>{quantity}</td>
        <td>{amount}</td>
        <td>{stamp}</td>
    </tr>
    {/display_historys}
</table>
    
