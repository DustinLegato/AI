<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="/public/css/stype.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/custom.css">
    <script src="/public/js/htmx.min.js"></script>
    <script src="/public/js/common.js"></script>
</head>
<body>
<div id="MainPage" name="MainPage">
    <span>
        <div class="commonLogoPage detailLink">
            <a href="main.asp?logo=main">
                <img src="/public/image/ailogo1.jpg" border="0" alt="">
            </a>
        </div>
    </span>
    <div class="commonLogoPage" style="z-index: -1;">
        <img src="/public/image/ailogo2.jpg" alt="" class="commonLogoPage">
    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <!--Setting session-->
            <td style="padding-right: 10px; text-align: right">
                <span class="TopLink"><b>
                    Ron Callaghan</b></span>
            </td>
            <td width="50px">
                <span class="dropdown">
                      <img onclick="showDropDown();"
                           src="/public/image/Nav.png"
                           width="30"
                           id="imgDropDown">
                </span>
                <div id="divDropDown" class="dropdown-menu" style="display: none;">
                    <ul style="margin-top: 0px;margin-bottom: 0px;padding-left: 5px;border-left-width: 0px !important;">
                        <li class="dropDown"><a href="RepairerListRequest.asp">Repairer</a></li>
                        <li class="dropDown"><a href="CountJob5days.asp">New Jobs</a></li>
                        <li class="dropDown"><a href="daySheet.asp">Day sheet</a></li>
                        <li class="dropDown"><a href="reportAccounting.asp">Account</a></li>
                        <li class="dropDown"><a href="https://www.autointegrity.com.au/help/TeamViewer.exe">Support</a></li>
                        <hr>
                        <li class="dropDown"><a href="repairerInvoicesReport.asp">Repairer Invoice</a></li>
                        <li class="dropDown"><a href="main.asp?logo=main&amp;ch=1">Dashboard</a></li>
                        <hr>
                        <li class="dropDown"><a href="/index.php?action=logout">Sign Out</a></li>
                    </ul>
                </div>
            </td>
            <!--End-->
        </tr>
        <tr>
            <!--Search session-->
            <td align="right" style="padding-right: 0px; padding-top: 5px; padding-bottom: 5px" colspan="2">
                <!-- submit button will not be posted to the server, we need a hidden field link to each button in order to recognize which button was clicked -->
                <input type="hidden" value="" id="searchType" name="searchType">
                <input type="hidden" value="" id="hdnAction" name="hdnAction">
                <input type="submit" value="search" id="btnSearch" name="btnSearch" style="display: none">
                <input type="submit" value="SearchAdv" id="btnSearchAdv" name="btnSearchAdv" style="display: none">
                <input type="submit" value="Submit" id="btnSubmit" name="btnSubmit" style="display: none">
                <input type="hidden" value="" id="hdnJobIDList" name="hdnJobIDList">
                <table width="100%">
                    <tbody>
                    <tr>
                        <td style="width: 280px;">
                            &nbsp;
                        </td>
                        <td>
                        </td>
                        <td style="width: 90px">
                            <input id="search" name="search" type="text" size="30"
                                   style="cursor:pointer;" class="txtSearch"
                                   hx-get="/index.php?action=main"
                                   hx-trigger="keyup[keyCode==13]"
                                   hx-target="#MainPage"
                                   hx-vals='{"search": document.getElementById("txtSearch").value}'
                                   hx-push-url="true"
                                   placeholder="Search..."
                                   value="<?php echo htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : ''); ?>">
                            <input type="hidden" id="hdnCompanyLogin" value="13">
                            <input type="hidden" id="hdnInternalExternal" name="hdnInternalExternal" value="">
                        </td>
                        <td style="width: 65px; cursor:pointer">
                            <b class="ButtonTopNormal"><b class="TabR1"></b><b class="TabR2"></b><b class="TabR3">
                                </b></b>
                            <div class="btnSearch">

                            </div>
                            <b class="ButtonBottomNormal"><b class="TabR3"></b><b class="TabR2"></b><b class="TabR1">
                                </b></b>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <!--Main bar session-->
    <table width="100%" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <td style="padding-left: 120px;">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                    <tr>
                        <!--Previous-->
                        <td style="padding-left: 8px !important;">
                            <div class="mainLink">
                                <b class="ButtonTopActive"><b class="TabR1"></b><b class="TabR2"></b><b class="TabR3">
                                    </b></b>
                                <a href="main.asp?status=all&amp;keepSessionMain=&amp;order=&amp;flg=1&amp;position=0">
                                    <div class="buttonActive">◄
                                    </div>
                                </a><b class="ButtonBottomActive"><b class="TabR3"></b><b class="TabR2"></b><b
                                            class="TabR1">
                                    </b></b>
                            </div>
                        </td>
                        <!--End-->
                        <!--Next-->
                        <td style="padding-left: 8px !important;">
                            <div class="mainLink">
                                <a href="main.asp?status=all&amp;order=&amp;keepSessionMain=&amp;flg=1&amp;position=40">
                                    <b class="ButtonTopActive"><b class="TabR1"></b><b class="TabR2"></b><b
                                                class="TabR3">
                                        </b></b>
                                    <div class="buttonActive">
                                        ►
                                    </div>
                                    <b class="ButtonBottomActive"><b class="TabR3"></b><b class="TabR2"></b><b
                                                class="TabR1">
                                        </b></b></a>
                            </div>
                        </td>
                        <!--End-->
                        <!--New Job-->
                        <td style="padding-left: 8px !important;">
                            <div class="mainLink">
                                <a href="detail.asp?job=0">
                                    <b class="ButtonTopActive"><b class="TabR1"></b>
                                        <b class="TabR2"></b><b class="TabR3"></b></b>
                                    <div class="buttonActive" title="">
                                        New
                                    </div>
                                    <b class="ButtonBottomActive"><b class="TabR3"></b><b class="TabR2"></b><b
                                                class="TabR1">
                                        </b></b>
                                </a>
                            </div>
                        </td>
                        <!--save assigned assessor-->
                        <!--End-->
                    </tr>
                    </tbody>
                </table>
            </td>
            <td align="right" style="padding-right: 30px;">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <!--All tab-->
                        <td style="padding-left: 2px">
                            <div style="text-align: center" class="mainLink">
                                <a href="main.asp?status=all"><b id="divAll_1" class="TabRTopActive">
                                        <b class="TabR1"></b><b class="TabR2"></b><b class="TabR3"></b></b>
                                    <div id="divAll_2" class="TabActive">
                                        All
                                    </div>
                                </a>
                            </div>
                        </td>

                        <!--Starred tab -->
                        <td style="padding-left: 2px;">
                            <div style="text-align: center" class="mainLink">
                                <a href="main.asp?status=star"><b id="divStar_1" class="TabRTop">
                                        <b class="TabR1"></b><b class="TabR2"></b><b class="TabR3"></b></b>
                                    <div id="divStar_2" class="TabNormal">
                                        &nbsp;<img src="/public/image/btnFollowUp_Main.png" alt="" style="cursor: pointer;"
                                                   border="0">&nbsp;
                                    </div>
                                </a>
                            </div>
                        </td>
                        <!--Start tab-->

                        <td style="padding-left: 2px;">
                            <div style="text-align: center" class="mainLink">
                                <a hx-get="/index.php?action=main&status=10"
                                   hx-trigger="click"
                                   hx-target="#MainPage"
                                   hx-push-url="true"><b id="divStart_1" class="TabRTop">
                                        <b class="TabR1"></b><b class="TabR2"></b><b class="TabR3"></b></b>
                                    <div id="divStart_2" class="TabNormal">
                                        Start
                                    </div>
                                </a>
                            </div>
                        </td>
                        <!--Request Quote tab-->
                        <td style="padding-left: 2px;">
                            <div style="text-align: center" class="mainLink">
                                <a href="main.asp?status=20"><b id="divQuote_1" class="TabRTop">
                                        <b class="TabR1"></b><b class="TabR2"></b><b class="TabR3"></b></b>
                                    <div id="divQuote_2" class="TabNormal">
                                        Quote
                                    </div>
                                </a>
                            </div>
                        </td>
                        <!--Assessor tab-->
                        <td style="padding-left: 2px;">
                            <div style="text-align: center" class="mainLink">
                                <a href="main.asp?status=30"><b id="divAssessor_1" class="TabRTop">
                                        <b class="TabR1"></b><b class="TabR2"></b><b class="TabR3"></b></b>
                                    <div id="divAssessor_2" class="TabNormal">
                                        Assessor
                                    </div>
                                </a>
                            </div>
                        </td>
                        <!--In Progress tab-->
                        <td style="padding-left: 2px;">
                            <div style="text-align: center" class="mainLink">
                                <a href="main.asp?status=35"><b id="divInProgress_1" class="TabRTop">
                                        <b class="TabR1"></b><b class="TabR2"></b><b class="TabR3"></b></b>
                                    <div id="divInProgress_2" class="TabNormal">
                                        In Progress
                                    </div>
                                </a>
                            </div>
                        </td>
                        <!--Complete tab-->
                        <td style="padding-left: 2px;">
                            <div style="text-align: center" class="mainLink">
                                <a href="main.asp?status=40"><b id="divComplete_1" class="TabRTop">
                                        <b class="TabR1"></b><b class="TabR2"></b><b class="TabR3"></b></b>
                                    <div id="divComplete_2" class="TabNormal">
                                        Complete
                                    </div>
                                </a>
                            </div>
                        </td>
                        <!--Awaiting Auth-->
                        <td style="padding-left: 2px;">
                            <div style="text-align: center" class="mainLink">
                                <a href="main.asp?status=45"><b id="divAwaiting_1" class="TabRTop">
                                        <b class="TabR1"></b><b class="TabR2"></b><b class="TabR3"></b></b>
                                    <div id="divAwaiting_2" class="TabNormal">
                                        Awaiting
                                    </div>
                                </a>
                            </div>
                        </td>
                        <!--Authorise tab-->
                        <td style="padding-left: 2px;">
                            <div style="text-align: center" class="mainLink">
                                <a href="main.asp?status=50"><b id="divAuthorise_1" class="TabRTop">
                                        <b class="TabR1"></b><b class="TabR2"></b><b class="TabR3"></b></b>
                                    <div id="divAuthorise_2" class="TabNormal">
                                        Authorise
                                    </div>
                                </a>
                            </div>
                        </td>
                        <!--Invoice tab-->
                        <td style="padding-left: 2px;">
                            <div style="text-align: center" class="mainLink">
                                <a href="main.asp?status=60"><b id="divInvoice_1" class="TabRTop">
                                        <b class="TabR1"></b><b class="TabR2"></b><b class="TabR3"></b></b>
                                    <div id="divInvoice_2" class="TabNormal">
                                        Invoice
                                    </div>
                                </a>
                            </div>
                        </td>
                        <!--Closed tab-->
                        <td style="padding-left: 2px;">
                            <div style="text-align: center" class="mainLink">
                                <a href="main.asp?status=70"><b id="divClosed_1" class="TabRTop">
                                        <b class="TabR1"></b><b class="TabR2"></b><b class="TabR3"></b></b>
                                    <div id="divClosed_2" class="TabNormal">
                                        Closed
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <!--End-->
    <!--Job session-->
    <b class="TabRTopActive"><b class="r1"></b><b class="r2"></b><b class="r3"></b><b class="r4"></b></b>
    <table width="100%" class="MainDiv_JobTable" cellpadding="0" cellspacing="0">
        <colgroup>
            <col style="width: 3px">
            <col style="padding-left: 5px; width: 20px"><!--Job Icon-->
            <col style="width: 100px"><!--OurRef-->
            <col style="width: 85px"><!--Date-->
            <col><!--Owner-->
            <col style="width: 85px;"><!--Rego-->
            <col style="width: 110px;"><!--Make-->
            <col style="width: 150px;"><!--Model-->
            <col style="width: 150px;"><!--Claim No [120]-->
            <col><!--Insurance-->
        </colgroup>
        <thead>
        <tr class="MainDiv_JobTableTitleRow">
            <td class="thc" style="height: 20px;"></td>
            <!--TruongDV 2010 03 24 Removed - sorting jobStatus for CSA-->
            <td>&nbsp;</td>
            <td><a class="ReportLinkActive" href="main.asp?status=all&amp;order=OurReference&amp;keepSessionMain=false">Ref</a>
            </td>
            <td><a class="ReportLinkActive" href="main.asp?status=all&amp;order=DateCreated&amp;keepSessionMain=false">Date</a>
            </td>
            <td><a class="ReportLinkActive"
                   href="main.asp?status=all&amp;order=Owner&amp;keepSessionMain=false">Owner</a></td>
            <td><a class="ReportLinkActive"
                   href="main.asp?status=all&amp;order=VehicleRegoNo&amp;keepSessionMain=false">Rego</a></td>
            <td><a class="ReportLinkActive" href="main.asp?status=all&amp;order=VehicleMake&amp;keepSessionMain=false">Make</a>
            </td>
            <td><a class="ReportLinkActive" href="main.asp?status=all&amp;order=VehicleModel&amp;keepSessionMain=false">Model</a>
            </td>
            <td><a class="ReportLinkActive"
                   href="main.asp?status=all&amp;order=InsuranceClaimNo&amp;keepSessionMain=false">Claim #</a></td>
            <td><a class="ReportLinkActive" href="main.asp?status=all&amp;order=Insurance">Insurance</a></td>
        </tr>
        </thead>
        <tbody>
        <!-- TAB ALL -->

        <?php foreach ($jobs as $job): ?>
        <tr class="mainDiv_ItemRowTotalLoss" onclick="passDetail('detail.asp','835913');">
            <td class="thc mainDiv_ItemRowTotalLoss" style="height: 20px;"></td>
            <td class="MainDiv_JobTableCell mainDiv_ItemRowTotalLoss">
                <img border="0"
                     src="/public/image/Icon_M_Complete.gif"
                     style="cursor:pointer">&nbsp;
            </td>
            <td class="MainDiv_JobTableCell mainDiv_ItemRowTotalLoss">
                <a class="NormalLink"
                   href="detail.asp?job=835913"><?php echo htmlspecialchars($job['ID']); ?>
                </a>
            </td>
<!--            <td class="MainDiv_JobTableCell">--><?php //echo htmlspecialchars($job['DateCreated']->format('d/m/Y')); ?><!--</td>-->
<!--            <td class="MainDiv_JobTableCell"><b>TP:</b> --><?php //echo htmlspecialchars($job['Owner']); ?><!--</td>-->
            <td class="MainDiv_JobTableCell"><?php echo htmlspecialchars($job['OurReference']); ?></td>
            <td class="MainDiv_JobTableCell"><?php echo htmlspecialchars($job['VehicleRegoNo']); ?></td>
<!--            <td class="MainDiv_JobTableCell">--><?php //echo htmlspecialchars($job['VehicleMake']); ?><!--</td>-->
<!--            <td class="MainDiv_JobTableCell">--><?php //echo htmlspecialchars($job['VehicleModel']); ?><!--</td>-->
<!--            <td class="MainDiv_JobTableCell">--><?php //echo htmlspecialchars($job['Claim']); ?><!--</td>-->
<!--            <td class="MainDiv_JobTableCell">--><?php //echo htmlspecialchars($job['Insurance']); ?><!--</td>-->
        </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr class="MainDiv_JobTableFooterRow">
            <td class="thc">
                &nbsp;
            </td>

            <td colspan="4" style="border-bottom: none; padding: 5 0 0 20; font-size: 11px;">
                <!--[4]first photo 2011 10 11-->
                Copyright © 2000,
                2025
                <a style="color: #000; text-decoration: none" href="https://www.autointegrity.com.au/">
                    AutoIntegrity.com.au</a>

            </td>


            <td colspan="5" style="border-bottom: none; padding: 5 30 0 0; font-weight: bold;
                    text-align: right">

                <!--<span style="cursor: pointer;" onclick="javascript:window.location.href='main.asp?status=all&position=0'">
                        &#x25c4; Prev </span>| <span style="cursor: pointer;" onclick="javascript:window.location.href='main.asp?status=all&position=40'">
                            Next &#x25ba;</span>
                    -->
                <span style="cursor: pointer;"
                      onclick="javascript:window.location.href='main.asp?status=all&amp;order=&amp;flg=1&amp;keepSec=True&amp;position=0'">
                        ◄ Prev </span>| <span style="cursor: pointer;"
                                              onclick="javascript:window.location.href='main.asp?status=all&amp;order=&amp;flg=1&amp;keepSec=True&amp;position=40'">
                            Next ►</span>

            </td>
        </tr>
        </tfoot>
    </table>

    <b id="posToShowGraph" class="TabRBottomActive"><b class="r4"></b><b class="r3"></b><b class="r2"></b><b
                class="r1"></b></b>
    <!--End-->
</div>
</body>
</html>