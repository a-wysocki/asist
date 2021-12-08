<?php
require_once("agents.php");
require "header.php";
echo'<table id="agents" class="table table-striped nowrap" style="width:100%">';
echo'<thead>';
echo'<tr>';
echo'<th>Lp.</th>';
echo'<th>ID agencji</th>';
echo'<th>Nazwa</th>';
echo'<th>Status</th>';
echo'<th>Ilość pracowników</th>';
echo'</tr>';
echo '</thead>';

$lp=1;
$agents=new agents();
echo'<tbody>';
foreach($agents->getAgents() as $agent) {
    echo'<tr data-id="'.$agent["id"].'">';
    echo '<td>'.$lp.'</td>';
    echo '<td>'.$agent["id"].'</td>';
    echo '<td>'.$agent["name"].'</td>';
    echo '<td>'.($agent["status"]==1?'aktywny':'nieaktywny').'</td>';
    echo '<td>'.$agent["amount_employees"].'</td>';
    echo'</tr>';
    $lp++;
}
echo'</tbody>';
echo'</table>';
echo'<input type="hidden" name="dataid" id="dataid" value="">';

echo '<div class="modal fade" id="DescModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lista agentów</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Agent</th>
                <th>Nazwa</th>
                <th>Status</th>
                <th>Data</th>
                <th>Lp</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Agent</th>
                <th>Nazwa</th>
                <th>Status</th>
                <th>Data</th>
                <th>Lp</th>
            </tr>
        </tfoot>
    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>';
echo'<div class="row">';
echo'<div class="col-12">';
echo'<canvas id="myChart" style="width:100%;max-width:700px"></canvas>';
echo'</div>';
echo'</div>';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script> 
var xValues = <?php echo $agents->getAgentsChartX(); ?>;
var yValues = <?php echo $agents->getAgentsChartY(); ?>;
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "3 aktywne agencje o największej ilości aktywnych pracowników"
    }
  }
});
</script>

<?php
require "footer.php";
?>