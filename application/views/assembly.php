
<div class="clearfix">
    <button id="add" onclick="add()">add part</button>
    <button id="return">Return to the Head office</button>
    <button id="buildit">Build it</button>
</div>
<div class="selectpart">
    <div id="selection1">
        <label>Select head</label>
            <select name ="sel1" id ="sel1" onchange="changePic(this.value)">
                <option></option>
                <option value="a1">a1</option>
                <option value="b1">b1</option>
                <option value="c1">c1</option>
                <option value="m1">m1</option>
                <option value="r1">r1</option>
            </select>
    </div>
    <div id="selection3">
        <label>Select Foot</label>
            <select name ="sel3" id ="sel3" onchange="changePic(this.value)">
                <option></option>
                <option value="a3">a3</option>
                <option value="b3">b3</option>
                <option value="c3">c3</option> 
                <option value="m3">m3</option>
                <option value="r3">r3</option>
            </select>
    </div>
    <div class="selection2">
    <label>Select body</label>
        <select name ="sel2" id ="sel2" onchange="changePic(this.value)">
            <option></option>
            <option value="a2">a2</option>
            <option value="b2">b2</option>
            <option value="c2">c2</option>
            <option value="m2">m2</option>
            <option value="r2">r2</option>     
        </select>
</div>
</div>
<h1 style="margin-top:2%;">Introduction:</h1>
<div id ="image" name="image" class="checkbox">
    <div class="imagebox">
        <image id ="showme" src ="" />
    </div>
    <div class="introbox">
        <text id="introduction"></text>
    </div>
</div>
<br/>
<h1 class="builds">the complete building listing</h1>
<div  id ="cimage" name="cimage" >
    <li><image id="head" src =""/></li>
    <li><image id="body" src =""/></li>
    <li><image id="foot" src=""/></li>  
</div>
 <script type="text/javascript" src="js/assembly.js"></script> 