
<a href="/history/bydatetime/page/1"><input type="button" value="Order by datetime"/></a>
<a href="/history/byrobotmodel/page/1"><input type="button" value="Order by robot model"/></a>
<a href="/history/welcome/filterbyrobotline"><input type="button" value="filter robot series"/></a>
<a href="/history/welcome/filterbyrobotmodel"><input type="button" value="filter by robot model"/></a>
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
        <td>{line}</td>
        <td>{model}</td>
        <td>{plant}</td>
        <td>{action}</td>
        <td>{quantity}</td>
        <td>{amount}</td>
        <td>{stamp}</td>
    </tr>
    {/display_historys}
</table>
    



<!--<div class="row">
    
    <table style="border: 1px solid white;">
        <tr>
            <th>id</th>
            <th>purchase</th>
            <th>assemblies</th>
            <th>shipment</th>
            <th>transaction time</th>            
        </tr>
       
{historys}
<tr>
    <td>{id}</td>
    <td>{purchase}</td>
    <td>{assemblies}</td>
    <td>{shipment}</td>
    <td>{transaction time}</td>
</tr>
{/historys}
    </table>
</div>-->