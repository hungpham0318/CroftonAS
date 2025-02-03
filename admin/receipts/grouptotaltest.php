<html>
<head>

<style>
div.dataTables_wrapper {
    margin: 0 auto;
    width: 100%;
}
.tableList {
    width: 100%;
    font-family: Georgia, serif;
    font-size: 13px;
    text-shadow: none !important;
}
.tableList thead tr th, .tableList tfoot tr th {
    vertical-align: middle !important;
    white-space: nowrap;
}
.tableList tbody tr.groupTR {
    border: groove medium #999;
    font-weight: bold;
}
.tableList tbody tr.groupTR td.groupTitle {
    background-color: #999;
    padding: 5px 10px !important;
}
.tableList tbody tr.groupTR td.groupTD {
    background-color: #999;
    font-size: 12px;
    white-space: normal;
}
.tableList tbody tr.groupTR td span.groupInfo {
    padding-left: 10px;
    font-size: 12px;
    color: blue;
    font-weight: normal;
}
.tableList tbody tr td {
    padding: 0px 10px !important;
    color: black !important;
    text-align: center;
    vertical-align: middle !important;
    white-space: nowrap;
}
.tableList tbody tr.odd td {
    background-color: #d0d0d0;
}
.tableList tbody tr.even td {
    background-color: #e0e0e0;
}
.tableList tbody tr.selectedRow td {
    background-color: #5CFFFF;
    opacity: 0.8;
}
</style>
</head>
<body>
    <table id="projectsList" class="display tableList" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Project</th>
                <th>Project Type</th>
                <th>Project In-Charge</th>
                <th>Item A</th>
                <th>Item B</th>
                <th>Item C</th>
                <th>Item D</th>
                <th>Item E</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Project</th>
                <th>Project Type</th>
                <th>Project In-Charge</th>
                <th>Item A</th>
                <th>Item B</th>
                <th>Item C</th>
                <th>Item D</th>
                <th>Item E</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td></td>
                <td>Project 01</td>
                <td>Development Stage</td>
                <td>Supervisor 01</td>
                <td>3</td>
                <td>10</td>
                <td>6</td>
                <td>22</td>
                <td>15</td>
            </tr>
            <tr>
                <td></td>
                <td>Project 02</td>
                <td>Development Stage</td>
                <td>Supervisor 02</td>
                <td>2</td>
                <td>15</td>
                <td>5</td>
                <td>18</td>
                <td>10</td>
            </tr>
            <tr>
                <td></td>
                <td>Project 03</td>
                <td>Product Stage</td>
                <td>Supervisor 01</td>
                <td>8</td>
                <td>25</td>
                <td>10</td>
                <td>20</td>
                <td>15</td>
            </tr>
            <tr>
                <td></td>
                <td>Project 04</td>
                <td>Marketing Stage</td>
                <td>Supervisor 02</td>
                <td>5</td>
                <td>15</td>
                <td>7</td>
                <td>13</td>
                <td>9</td>
            </tr>
            <tr>
                <td></td>
                <td>Project 05</td>
                <td>Disposable Stage</td>
                <td>Supervisor 03</td>
                <td>2</td>
                <td>1</td>
                <td>0</td>
                <td>5</td>
                <td>3</td>
            </tr>
        </tbody>
    </table>


<script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.12.3.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="/Editor16/js/dataTables.editor.min.js"></script>
<script>
$(document).ready(function () {
    var $tableEle = $('#projectsList');
    var groupCol = 3;

    //Initiate DataTable
    $tableList = $tableEle.DataTable({
        "dom": "<'clear'><'H'r>t<'F'>",
            "autoWidth": true,
            "retrieve": true,
            "orderFixed": [
            [groupCol, 'asc']
        ],
            "columnDefs": [{
            "orderable": false,
            "targets": [0]
        }, {
            "visible": false,
            "targets": [2, 3]
        }],
            "drawCallback": function (settings) {
            var that = this;
            if (settings.bSorted || settings.bFiltered) {
                this.$('td:first-child', {
                    "filter": "applied"
                }).each(function (i) {
                    that.fnUpdate(i + 1, this.parentNode, 0, false, false);
                });
            }

            var api = this.api();
            var rows = api.rows({
                page: 'current'
            }).nodes();
            var rowsData = api.rows({
                page: 'current'
            }).data();

            var last = null;
            var subTotal = new Array();
            var grandTotal = new Array();
            var groupID = -1;

            api.column(groupCol, {
                page: 'current'
            }).data().each(function (group, i) {
                if (last !== group) {
                    groupID++;
                    $(rows).eq(i).before("<tr class='groupTR'><td colspan='2' class='groupTitle'>" + group + "</td></tr>");
                    last = group;
                }

                //Sub-total of each column within the same grouping
                var val = api.row(api.row($(rows).eq(i)).index()).data(); //Current order index
                $.each(val, function (colIndex, colValue) {
                    if (typeof subTotal[groupID] == 'undefined') {
                        subTotal[groupID] = new Array();
                    }
                    if (typeof subTotal[groupID][colIndex] == 'undefined') {
                        subTotal[groupID][colIndex] = 0;
                    }
                    if (typeof grandTotal[colIndex] == 'undefined') {
                        grandTotal[colIndex] = 0;
                    }

                    value = colValue ? parseFloat(colValue) : 0;
                    subTotal[groupID][colIndex] += value;
                    grandTotal[colIndex] += value;
                });
            });

            $('tbody').find('.groupTR').each(function (i, v) {
                var rowCount = $(this).nextUntil('.groupTR').length;
                var subTotalInfo = "";
                for (var a = 4; a <= 8; a++) {
                    subTotalInfo += "<td class='groupTD'>" + subTotal[i][a].toFixed(2) + "/" + grandTotal[a].toFixed(2) + "</td>";
                }
                $(this).append(subTotalInfo);
            });
        }
    });
});
</script>
</body>
</html>