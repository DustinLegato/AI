function searchEnter(evt){
    try{
        evt = (window.event) ? window.event : evt;
        var intKey = (evt.keyCode)? evt.keyCode: evt.charCode;

        /*Enter key is pressed*/
        if(intKey == 13)
        {
            document.getElementById("searchType").value = "search";
            btnSubmit_click("btnSearch");
            return true;
        }

    }
    catch(ex)
    {}
}

function btnSubmit_click(sID)
{
    if (sID == "btnSearch")
        document.getElementById("searchType").value = "search";
    else if (sID == "btnSearchAdv")
        document.getElementById("searchType").value = "searchAdv";

    //2013 06 28 adding for QBE calendar searching START
    if (document.getElementById("hdnCompanyLogin") != null) {
        if (document.getElementById("hdnCompanyLogin").value == "438") {
            document.getElementById("hdnIsQBECalendar").value = "calendar";
        }
    }
    //2013 06 28 adding for QBE calendar searching START

    document.getElementById(sID).click();
}

function setFocus(sID)
{
    /*
        set focus on to control
        params: sID: the ID of the control
    */
    var oControl = document.getElementById(sID);
    if (!oControl)
        alert("Control " + sID + " not found.");
    else
        oControl.focus();
}


String.prototype.trim = function()
{
    return this.replace(/(^\s*)|(\s*$)/g, "");
}

String.prototype.ltrim = function()
{
    return this.replace(/^\s+/,"");
}

String.prototype.rtrim = function()
{
    return this.replace(/\s+$/,"");
}

String.prototype.removeSpace = function()
{
    return this.replace(/(\s*)/g, "");
}



//Get position of scroll.
function getScrollBarPos()
{
    var scrollPos = new Object()
    if (top.self.pageYOffset) // all except Explorer
    {
        scrollPos.x = top.self.pageXOffset;
        scrollPos.y = top.self.pageYOffset;
    }
    else if (top.document.documentElement && top.document.documentElement.scrollTop)
        // Explorer 6 Strict
    {
        scrollPos.x = document.documentElement.scrollLeft;
        scrollPos.y = document.documentElement.scrollTop;

    }
    else if (top.document.body) // all other Explorers
    {
        scrollPos.x = top.document.body.scrollLeft;
        scrollPos.y = top.document.body.scrollTop;

    }

    return scrollPos;
}

//Open div detail or not open
function getClientDimension()
{
    var clientDimension = new Object();
    if (self.innerHeight) // all except Explorer
    {
        clientDimension.x = top.self.innerWidth;
        clientDimension.y = top.self.innerHeight;
    }
    else if (top.document.documentElement && top.document.documentElement.clientHeight) // Explorer 6 Strict Mode
    {
        clientDimension.x = top.document.documentElement.clientWidth;
        clientDimension.y = top.document.documentElement.clientHeight;
    }
    else if (top.document.body) // other Explorers
    {
        clientDimension.x = top.document.body.clientWidth;
        clientDimension.y = top.document.body.clientHeight;
    }

    return clientDimension;
}

//get the page height
function getPageDimension()
{
    var x,y;
    var test1 = document.body.scrollHeight;
    var test2 = document.body.offsetHeight;
    if (test1 > test2) // all but Explorer Mac
    {
        x = document.body.scrollWidth;
        y = document.body.scrollHeight;
    }
    else // Explorer Mac;
         //would also work in Explorer 6 Strict, Mozilla and Safari
    {
        x = document.body.offsetWidth;
        y = document.body.offsetHeight;
    }

    var pageDimension = new Object();
    pageDimension.x = x;
    pageDimension.y = y;

    return pageDimension;
}

//get the mouse cursor position
function getMousePos(ev)
{
    ev = (window.event) ? window.event : ev;
    if(ev.pageX || ev.pageY)
    {
        return {x:ev.pageX, y:ev.pageY};
    }
    else
    {
        //may be there is a different between IE 6 strict mode and normal mode
        var scrollPos = getScrollBarPos();

        return {    x:ev.clientX + scrollPos.x - document.body.clientLeft,
            y:ev.clientY + scrollPos.y  - document.body.clientTop 	};
    }

}


function checkBrowser()
{
    var b = navigator.appName;
    if(b.indexOf("Netscape") != -1)
    {
        return "NC";
    }
    else if(b == "Opera" || (navigator.userAgent.indexOf("Opera") > 0))
    {
        return "OP";
    }
    else if(b == "Microsoft Internet Explorer")
    {
        return "IE";
    }
    return "";
}

function isValidEmail(strEmail)
{
    //check for blank
    if (strEmail == "" || strEmail == null || strEmail == undefined)
    {
        alert("Please enter email address!");
        return false;
    }
    /*
    var str = strEmail.toLowerCase(); // email string
    var reg1 = /(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/; // not valid
    //var reg2 = /^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/; // valid
    var reg2 = /^[a-z0-9_\-']+(\.[_a-z0-9\-]+)*@([_a-z0-9\-]+\.)+([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel)$/;
    // if syntax is valid
    if (!reg1.test(str) && reg2.test(str))
        return true;

    alert("\"" + str + "\" is an invalid e-mail.");
    return false;

    */
    if (strEmail.indexOf("@") == -1) {
        alert("\"" + str + "\" is an invalid e-mail.");
        return false;
    }
    return true;

}

function separateEmail(strEmail) {
    if (strEmail == "" || strEmail == null || strEmail == undefined) {
        alert("Please enter email address!");
        return false;
    }

    if (strEmail.indexOf(" ") > 0) {
        alert("Email address should separate with ;");
    }

    if (strEmail.indexOf(";") > 0) {
        var arrEmail = strEmail.split(";");

        for (i = 0; i < arrEmail.length; i++) {
            var tmpemail = arrEmail[i];

            if (isValidEmail2(tmpemail) == false) {
                return false;
            }
        }
    }

}


function isValidEmail2(strEmail) {
    //check for blank
    if (strEmail == "" || strEmail == null || strEmail == undefined)
        return false;

    var str = strEmail.toLowerCase(); // email string
    var reg1 = /(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/; // not valid

    //paint&panel@sxauto.com.au --> & is not valid email. We have to put it to valid 2013 02 19
    //var reg2 = /^[a-z0-9_\-']+(\.[_a-z0-9\-]+)*@([_a-z0-9\-]+\.)+([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel)$/;
    //var reg2 = /^[a-z0-9_\-'&]+(\.[_a-z0-9\-]+)*@([_a-z0-9\-]+\.)+([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel)$/;
    //var reg2 = /^[a-z0-9_\-'&]+(\.[_a-z0-9\-]+)*@([_a-z0-9\-]+\.)+([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel)$/;
    var reg2 = /^[a-z0-9_\-'&]+(\.[_a-z0-9\-]+)*@([_a-z0-9\-]+\.)+([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel|kiwi|services)$/; //fixed 2016 08 11 mobile62

    // if syntax is valid
    if (!reg1.test(str) && reg2.test(str))
        return true;

    //alert("\"" + str + "\" is an invalid e-mail.");
    return false;
}

function getXMLText(Object,TagName,returnBlank)
{
    try
    {
        return Object.getElementsByTagName(TagName)[0].firstChild.nodeValue;
    }
    catch(ex)
    {
        if(returnBlank)
        {
            return "";
        }
        else
        {
            return null;
        }
    }
}

//get the text contained in the XML node and return as number
function getXMLNumber(aRecord,aTagName,returnZero)
{
    try
    {
        var value = parseFloat(aRecord.getElementsByTagName(aTagName)[0].firstChild.nodeValue);
        if (isNaN(value))
        {
            if(returnZero)
                return 0;
            return null;
        }
        else
            return value;
    }
    catch(err)
    {
        if(returnZero)
            return 0;
        return null;
    }
}



//Open div detail or not open//
function getClientDimension()
{
    var clientDimension = new Object();
    if (self.innerHeight) // all except Explorer
    {
        clientDimension.x = top.self.innerWidth;
        clientDimension.y = top.self.innerHeight;
    }
    else if (top.document.documentElement && top.document.documentElement.clientHeight) // Explorer 6 Strict Mode
    {
        clientDimension.x = top.document.documentElement.clientWidth;
        clientDimension.y = top.document.documentElement.clientHeight;
    }
    else if (top.document.body) // other Explorers
    {
        clientDimension.x = top.document.body.clientWidth;
        clientDimension.y = top.document.body.clientHeight;
    }
    return clientDimension;
}


function convertCharXML(strString)
{
    /*
        1. & - &amp;
        2. < - &lt;
        3. > - &gt;
        4. " - &quot;
        5. ' - &#39;
        6. ’ - &#8217;
    */
    if(strString == "" || strString == null)
        return "";

    //replace all special character in the value with xml markup

    var str = new String(strString);
    str = str.replace(/&/g, "&amp;");
    str = str.replace(/</g, "&lt;");
    str = str.replace(/>/g, "&gt;");
    str = str.replace(/"/g, '&quot;');
    str = str.replace(/'/g, '&#39;');
    str = str.replace(/’/g, '&#8217;');

    return str;
}

/********calculate elem position ********/
function calOffsetLeft(elem)
{
    return calOffset(elem,"offsetLeft");
}

function calOffsetTop(elem)
{
    return calOffset(elem,"offsetTop");
}

function calOffset(elem,attr)
{
    if (typeof elem == "string")
        elem = document.getElementById(elem);
    var el = elem;
    var offset = 0;
    while (el)
    {
        offset += el[attr];
        el = el.offsetParent;
    }
    return offset;
}
/********calculate elem position end ********/






/******************************************************
 AJAX Transporter class
 *******************************************************/
//create a request DOM that will be sent to the server
function initRequestDOM(strAction,clientData)
{
    if (!clientData)
        clientData = "";

    //build the request DOM structure
    var domain = "http://" + window.location.toString().split("//")[1].split("/")[0] + "/";
    url= "server.asp?time=" + new Date().getTime();
    if (domain != "http://localhost/" && domain != "http://server/" && domain != "http://kfc/")
        url= domain + "server.asp?time=" + new Date().getTime();

    method = "POST";
    var params = "<clientRequest>"
        + "<action>" + strAction + "</action>"
        + "<clientData>" + clientData + "</clientData>"
        + "</clientRequest>";

    return loadXMLFromString(params);
}


//the xmlhttprequest object class
var net = new Object();
net.READY_STATE_UNINITAALIZED = 0;
net.READY_STATE_LOADING = 1;
net.READY_STATE_LOADED = 2;
net.READY_STATE_INTERACTIVE = 3;
net.READY_STATE_COMPLETE = 4;
net.ContentLoader = function(url,params,method,onload,onerror,isNotSend)
{
    this.url = url;
    if (method == "")
        this.method = "POST";
    else
        this.method = method;
    this.req = null;
    this.onload = onload;
    this.onerror = (onerror) ? onerror : this.defaultError;
    this.params = params;
    (isNotSend == undefined)?this.loadXMLDoc():null;
}

net.ContentLoader.prototype=
    {
        loadXMLDoc: function()
        {
            //Fix for IE 10 START 2013 06 12
            if (window.XMLHttpRequest)//// code for IE7+, Firefox, Chrome, Opera, Safari
                this.req = new XMLHttpRequest();
            else
                this.req = new ActiveXObject("Microsoft.XMLHTTP");
            ///Fix for IE 10 END 2013 06 12

            /*
            if (window.ActiveXObject)
                this.req = new ActiveXObject("Microsoft.XMLHTTP");
            else
                this.req = new XMLHttpRequest();
            */

            if (this.req)
            {

                var loader = this;
                this.req.onreadystatechange = function()
                {
                    loader.onReadyState.call(loader);
                }

                this.req.open(this.method,this.url,true);
                this.req.send(this.params);
            }

        },

        onReadyState:function()
        {
            var loader = this;
            var req = this.req;
            var ready = req.readyState;
            if (ready == net.READY_STATE_COMPLETE)
            {
                var httpStatus = req.status;
                if (httpStatus == 200 || httpStatus ==0)
                {
                    loader.serverRedirect.call(loader);
                    this.onload.call(this);
                }
                else
                {
                    this.onerror.call(this);
                }
            }
        },

        serverRedirect:function()
        {
            var tmpRedirectTo = getXMLText(this.req.responseXML.documentElement,"RedirectTo",true);
            if (tmpRedirectTo !=  "")
                top.location.href = tmpRedirectTo;
        },

        defaultError:function()
        {
            //Error handler for request , can be some exception on the server , currently we use this for Internet Connection dropped
            try
            {
                //handleConnectionLost(true);
            }
            catch(ex){}
        }
    }

/******************************************************
 AJAX Transporter class end
 *******************************************************/

//cross browser create XML DOM
function createXMLDOM()
{
    var xmlDoc;
    // code for IE
    if (window.ActiveXObject)
    {
        xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
    }
    // code for Mozilla, etc.
    else if (document.implementation && document.implementation.createDocument)
    {
        xmlDoc = document.implementation.createDocument("","",null);
    }
    else
    {
        alert('Your browser cannot handle this script');
    }
    return xmlDoc;
}


//cross browser load xml string to xml document
function loadXMLFromString(xmlString,xmlDoc)
{
    //xmlString = xmlString.replace(/&/g,"&amp;");
    if(xmlDoc == null || xmlDoc == undefined)
        xmlDoc = createXMLDOM();

    if (document.implementation.createDocument)
    {
        // Mozilla, create a new DOMParser
        var parser = new DOMParser();
        xmlDoc = parser.parseFromString(xmlString, "text/xml");
    }
    else if (window.ActiveXObject)
    {
        // IE, create a new XML document using ActiveX
        // and use loadXML as a DOM parser.
        xmlDoc.loadXML(xmlString);
    }
    return xmlDoc;
}

function showElement(pElem,isShow,iTop,iLeft)
{
    /*
        Show hide element in the web page
        params: - pElem: the elementID or object
                - isShow: true/false
    */
    if (typeof pElem == "string")
        pElem = document.getElementById(pElem);
    if (pElem == null || pElem == undefined)
        return;

    if (isShow == undefined || isShow == null)
    {
        if (pElem.style.display == "")
            isShow = false;
        else
            isShow = true;
    }
    if (isShow)
    {
        if (isNumber(iTop))
            pElem.style.top = iTop + "px";
        if (isNumber(iLeft))
            pElem.style.left = iLeft  + "px";

        pElem.style.display = "";
    }
    else
    {
        pElem.style.display = "none";
    }
}

function getOffset(elem)
{
    /*get the element offset*/
    if (typeof elem == "string")
        elem = document.getElementById(elem);

    var elemOffset = {};
    var tmpDisplayStatus = elem.style.display;

    //get the element offset
    showElement(elem,true);
    elemOffset.w = elem.offsetWidth;
    elemOffset.h = elem.offsetHeight;

    //restore the elem display status
    elem.style.display = tmpDisplayStatus;

    return elemOffset;

}

function isNumber(aNumber)
{
    if (aNumber == undefined || aNumber == null || String(aNumber) == "")
        return false;

    //if 0 return true
    if (String(aNumber) == "0" )
        return true;
    return !isNaN(aNumber);
}


function setComboBoxSelectedIndex(pComboBox,pValue)
{
    /*
        set the selected index in the combo box
        params:
            - ppComboBox: the combo box control or id
            - pValue : the value in combo box to search for and set selected index
    */
    if (typeof pComboBox == "string")
        pComboBox = document.getElementById(pComboBox);

    if (pComboBox == undefined || pComboBox == null)
    {
        alert("Select box not found.");
        return;
    }

    for(i=0; i<pComboBox.options.length; i++)
    {
        if (pComboBox.options[i].value.toLowerCase() == pValue.toLowerCase())
        {
            pComboBox.selectedIndex = i;
            return;
        }
    }

    //if no match , set the selected index to 0
    if (pComboBox.options.length == i)
        pComboBox.selectedIndex = 0;
}

function getQueryString(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    var pair;
    for (var i=0;i<vars.length;i++)
    {
        pair = vars[i].split("=");
        if (pair[0] == variable)
        {
            while(pair[1].indexOf("%20") > 0)
                pair[1] = pair[1].replace("%20"," ");

            return pair[1];
        }

    }
    return "QueryStringNotExsit";
}



function Check_SpellWord(oEditor)		//in IE, user should enable ActiveX to run this function
{
    var myTextStr;
    //myTextStr =  tinyMCE.get(oEditor).getContent();
    myTextStr = document.getElementById(oEditor).value;

    if (myTextStr.trim() == "")
        return;

    var oWord;
    var oTmpDoc;
    var lOrigTop;

    //Create a Word document object...
    oWord = new ActiveXObject("Word.Application");
    oTmpDoc = oWord.Documents.Add();
    oWord.Visible = true;

    //Position Word off screen to avoid having document visible...
    lOrigTop = oWord.Top;
    oWord.WindowState = 0;
    oWord.Top = -3000;

    //Copy the contents of the text box to the clipboard
    window.clipboardData.setData("Text", myTextStr);

    //Assign the text to the document and check spelling...
    oTmpDoc.Content.Paste();
    oTmpDoc.Activate();
    oTmpDoc.CheckSpelling();
    //After user has made changes, use the clipboard to
    //transfer the contents back to the text box
    oTmpDoc.Content.Copy();

    myTextStr = window.clipboardData.getData("Text"); //text TruongDV 2010 11 09

    //Close the document and exit Word...
    oTmpDoc.Saved = true;
    oTmpDoc.Close();

    oTmpDoc = null;

    oWord.Top = lOrigTop;
    oWord.Quit();
    oWord = null;

    //oEditor.value = myTextStr
    //tinyMCE.get(oEditor).setContent(myTextStr);

    document.getElementById(oEditor).value = myTextStr;
}



//2012 10 10 START - At the moment we use this function for CSA and Real Insurance on Recommended Reapairer.
function aValid_JS(x, y) {
    var ret = false;
    if (x == "" || x == "0")
        x = 0;
    else
        x = parseInt(x);

    if (y == "" || y == "0")
        y = 0;
    else
        y = parseInt(y);

    if (x >= y) {
        if ((x & y) == y) {
            ret = true;
        }
    }
    return ret;
}
//2012 10 10 END


//2014 04 04
function checkBusinessUnit() {
    var ret = true;
    var companyLogin = document.getElementById("NoUpdate_CompanyID").value;
    if (companyLogin == "6") {
        var oCboBusinessUnit = document.getElementById("businessUnit")
        var sBusinessUnit = oCboBusinessUnit.options[oCboBusinessUnit.selectedIndex].value
        if (sBusinessUnit == "") {
            alert("Please select Business Unit from combo box.");
            oCboBusinessUnit.focus();
            ret = false;
        }
    }
    return ret;
}

//1234578 56987 --> ok
function isNumberWithSpaceInString(strNumber) {
    var RE = /^[\s\d]+$/; ///^-{0,1}\d*\.{0,1}\d+$/;
    return RE.test(strNumber);
}


//2014 10 09 - set BusinessUnit readonly - Innovation Group changes
function setCboReadOnly(cboID, flgDisable) {
    if (document.getElementById(cboID) != null) {
        if (document.getElementById(cboID).disabled != flgDisable) {
            document.getElementById("businessUnit").disabled = flgDisable;
        }
    }
}


//2014 10 17 START
function countNewLineChar(strText) {
    var ret = 0;
    for (i = 0; i < strText.length; i++) {
        if (strText.charCodeAt(i) == 10) {//10 for new line
            ret += 1;
        }
    }
    return ret;
}

function countChars(what, maxLenString, span) {
    if (document.getElementById(what) == null || document.getElementById(what) == undefined) {
        return;
    }
    else{
        var totalNewLine = countNewLineChar(document.getElementById(what).value);
        var textLength = document.getElementById(what).value.length + totalNewLine;
        var strText = document.getElementById(what).value;

        if (textLength > maxLenString) {
            document.getElementById(what).value = truncateString(strText, maxLenString); //Need to check on IE and FF.
        }
    }
    if (span != null) {
        //document.getElementById(span).innerHTML = "(Counter: " + (document.getElementById(what).value.length + totalNewLine) + ")";
        if (document.getElementById(what).value.length + totalNewLine > 0) {
            document.getElementById(span).innerHTML = "Char(s): " + (document.getElementById(what).value.length + totalNewLine) + "";
        }
        else {
            document.getElementById(span).innerHTML = "";
        }
    }
}
//2014 10 17 END

//get position div show center of page
function setDivCenter(IDDiv) {
    //show div with IDDiv to browser.
    document.getElementById(IDDiv).style.visibility = "visible";

    //set center of browser
    var clientSize = getClientDimension();
    var scrollPos = getScrollBarPos();
    var posDivLeft = (clientSize.x - document.getElementById(IDDiv).offsetWidth) / 2;
    var sDivHeight = document.getElementById(IDDiv).offsetHeight;

    //document.getElementById(IDDiv).style.top  = posDivTop + "px";
    document.getElementById(IDDiv).style.left = posDivLeft + "px";

    /*Mizila FireFox*/
    if (dom && !document.all) {
        document.getElementById(IDDiv).style.top = window.pageYOffset + (window.innerHeight - (window.innerHeight - y1)) + "px";
    }
    if (document.layers) {
        document.layers[IDDiv].top = window.pageYOffset + (window.innerHeight - (window.innerHeight - y1)) + "px";
    }
    /*Internet Explorer*/
    if (document.all) {
        document.all[IDDiv].style.top = document.body.scrollTop + (document.body.clientHeight - (document.body.clientHeight - y1)) + "px";
    }
}

//2017 12 27 -> this is dropdown menu list
function showDropDown() {
    oDiv = document.getElementById('divDropDown');
    var iLeft = calOffsetLeft(document.getElementById("imgDropDown"));
    var iTop = calOffsetTop(document.getElementById("imgDropDown"));

    if (oDiv.style.display == "none") {
        oDiv.style.display = "";
        oDiv.style.left = (iLeft - 115) + "px";
    } else {
        oDiv.style.display = "none";
        oDiv.style.left = (iLeft - 115) + "px";
    }
}