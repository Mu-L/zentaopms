<?php include '../../common/view/header.lite.html.php';?>
<<<<<<< HEAD
<?php js::import($jsRoot . 'echarts/echarts.common.min.js'); ?>
<?php js::import($jsRoot . 'html2canvas/min.js'); ?>
<?php $soFar = sprintf($this->lang->report->annualData->soFar, $year);?>
=======
<?php include '../../common/view/chosen.html.php';?>
<?php js::import($jsRoot . 'echarts/echarts.common.min.js'); ?>
<?php js::import($jsRoot . 'html2canvas/min.js'); ?>
<?php $annualDataLang   = $lang->report->annualData;?>
<?php $annualDataConfig = $config->report->annualData;?>
<?php $soFar = sprintf($annualDataLang->soFar, $year);?>
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae
<div id='container' style='background-image: url(<?php echo $config->webRoot . 'theme/default/images/main/annual_data_bg.png'?>)'>
  <main id='main' style='background: url(<?php echo $config->webRoot . 'theme/default/images/main/annual_layout_header.png'?>) top no-repeat'>
    <header id='header'>
      <h1 class='text-holder' data-id='title'><?php echo $title;?></h1>
    </header>
    <div id='toolbar'>
<<<<<<< HEAD
      <?php echo html::select('year', $years, $year, "class='form-control'");?>
      <button type='button' class='btn btn-primary' id='exportBtn' title='<?php echo $lang->export;?>'><i class='icon icon-share'></i></button>
      <a id='imageDownloadBtn' class='hidden' download='annual_data.png'></a>
    </div>
    <section id='baseInfo'>
      <header><h2 class='text-holder'><?php echo $lang->report->annualData->baseInfo . $soFar;?></h2></header>
      <div>
        <ul id='infoList'>
          <li>
            <?php echo $userID ? $lang->report->annualData->logins : ($dept ? $lang->report->annualData->deptUsers : $lang->report->annualData->companyUsers);?>
            <strong><?php echo $userID ? $data['logins'] : $data['users'];?></strong>
          </li>
          <li>
            <?php echo $lang->report->annualData->actions;?>
            <strong><?php echo $data['actions'];?></strong>
          </li>
          <li>
            <?php echo $lang->report->annualData->consumed;?>
            <strong><?php echo $data['consumed'];?></strong>
          </li>
          <li class='dropdown dropdown-hover'>
            <?php echo $lang->report->annualData->todos;?>
            <strong><?php echo $data['todos']->count;?></strong>
            <ul class='dropdown-menu pull-right'>
              <li><?php echo $lang->report->annualData->todos;?></li>
              <li><span class='todoStatus'><?php echo $lang->report->annualData->todoStatus['all'];?></span><span><?php echo $data['todos']->count;?></span></li>
              <li><span class='todoStatus'><?php echo $lang->report->annualData->todoStatus['undone'];?></span><span><?php echo $data['todos']->undone;?></span></li>
              <li><span class='todoStatus'><?php echo $lang->report->annualData->todoStatus['done'];?></span><span><?php echo $data['todos']->done;?></span></li>
=======
      <div class='pull-left'>
        <span><?php echo $annualDataLang->scope;?></span>
        <?php echo html::select('year', $years, $year, "class='form-control'");?>
        <?php echo html::select('dept', $depts, $dept, "class='form-control chosen'");?>
        <?php echo html::select('userID', $users, $userID, "class='form-control chosen'");?>
      </div>
      <div class='pull-right'>
        <button type='button' class='btn btn-primary' id='exportBtn' title='<?php echo $lang->export;?>'><i class='icon icon-export'></i></button>
        <a id='imageDownloadBtn' class='hidden' download='annual_data.png'></a>
      </div>
    </div>
    <section id='baseInfo'>
      <header><h2 class='text-holder'><?php echo $annualDataLang->baseInfo . $soFar;?></h2></header>
      <div>
        <ul id='infoList'>
          <li>
            <?php echo $userID ? $annualDataLang->logins : ($dept ? $annualDataLang->deptUsers : $annualDataLang->companyUsers);?>
            <strong><?php echo $userID ? $data['logins'] : $data['users'];?></strong>
          </li>
          <li>
            <?php echo $annualDataLang->actions;?>
            <strong><?php echo $data['actions'];?></strong>
          </li>
          <li>
            <?php echo $annualDataLang->consumed;?>
            <strong><?php echo $data['consumed'];?></strong>
          </li>
          <li class='dropdown dropdown-hover'>
            <?php echo $annualDataLang->todos;?>
            <strong><?php echo $data['todos']->count;?></strong>
            <ul class='dropdown-menu pull-right'>
              <li><?php echo $annualDataLang->todos;?></li>
              <li><span class='todoStatus'><?php echo $annualDataLang->todoStatus['all'];?></span><span><?php echo (int)$data['todos']->count;?></span></li>
              <li><span class='todoStatus'><?php echo $annualDataLang->todoStatus['undone'];?></span><span><?php echo (int)$data['todos']->undone;?></span></li>
              <li><span class='todoStatus'><?php echo $annualDataLang->todoStatus['done'];?></span><span><?php echo (int)$data['todos']->done;?></span></li>
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae
            </ul>
          </li>
          <?php
          $contributions = 0;
          $maxCount      = 0;
<<<<<<< HEAD
          $radarData     = array('product' => 0, 'project' => 0, 'devel' => 0, 'qa' => 0, 'other' => 0);
=======
          $radarData     = array('product' => 0, 'execution' => 0, 'devel' => 0, 'qa' => 0, 'other' => 0);
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae
          foreach($data['contributions'] as $objectType => $objectContributions)
          {
              $sum = array_sum($objectContributions);
              if($sum > $maxCount) $maxCount = $sum;
              $contributions += $sum;

              foreach($objectContributions as $actionName => $count)
              {
<<<<<<< HEAD
                  $radarType = isset($config->report->annualData['radar'][$objectType][$actionName]) ? $config->report->annualData['radar'][$objectType][$actionName] : 'other';
                  $radarData[$radarType] += $count;
=======
                  $radarTypes = isset($annualDataConfig['radar'][$objectType][$actionName]) ? $annualDataConfig['radar'][$objectType][$actionName] : array('other');
                  foreach($radarTypes as $radarType) $radarData[$radarType] += $count;
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae
              }
          }
          ?>
          <?php if(!empty($dept) or !empty($userID)):?>
          <li>
<<<<<<< HEAD
            <?php echo $lang->report->annualData->contributions;?>
=======
            <?php echo $annualDataLang->contributions;?>
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae
            <strong><?php echo $contributions;?></strong>
          </li>
          <?php endif;?>
        </ul>
      </div>
<<<<<<< HEAD
    </section>
    <section id='actionData'>
      <header><h2 class='text-holder'><?php echo $lang->report->annualData->actionData . $soFar;?></h2></header>
      <div>
        <ul>
          <?php foreach($lang->report->annualData->objectTypeList as $objectType => $objectName):?>
          <li class='dropdown dropdown-hover'>
            <span class='name'><?php echo $objectName;?></span>
            <span class='ratio'>
            <?php
            $objectContributions = isset($data['contributions'][$objectType]) ? $data['contributions'][$objectType] : array();
            $contributionActions = zget($config->report->annualData['contributions'], $objectType, array_keys($objectContributions));
            
            $colors = $config->report->annualData['colors'];
            $detail = "<li><span class='header'>{$objectName}</span></li>";
            foreach($contributionActions as $actionName)
            {
                if(isset($objectContributions[$actionName]))
                {
                    $color = array_shift($colors);
                    $count = $objectContributions[$actionName];
                    $width = round(($count / $maxCount * 100), 1);
                    echo "<span class='item' style='background-color:{$color};width:{$width}%'>{$count}</span>";
            
                    $detail .= "<li><span class='color' style='background-color:{$color}'></span><span class='item-name'>" . $lang->report->annualData->actionList[$actionName] . "</span><span class='count'>{$count}</span></li>";
                }
            }
            ?>
            </span>
            <ul class='dropdown-menu'><?php echo $detail;?></ul>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
    </section>
    <section id='radar'>
      <header><h2 class='text-holder'><?php echo $lang->report->annualData->radar . $soFar;?></h2></header>
      <div id='radarCanvas'></div>
    </section>
    <section id='projectData'>
      <header><h2 class='text-holder'><?php echo $lang->report->annualData->projects . $soFar;?></h2></header>
      <div>
        <table class='table table-hover'>
          <thead>
            <tr>
              <?php foreach($lang->report->annualData->projectFields as $field => $name):?>
=======
    </section>
    <section id='actionData'>
      <header><h2 class='text-holder'><?php echo ((empty($dept) and empty($userID)) ? $annualDataLang->actionData :$annualDataLang->contributionData) . $soFar;?></h2></header>
      <div>
        <ul>
          <?php foreach($annualDataLang->objectTypeList as $objectType => $objectName):?>
          <li class='dropdown dropdown-hover'>
            <span class='name'><?php echo $objectName;?></span>
            <span class='ratio'>
            <?php
            $objectContributions = isset($data['contributions'][$objectType]) ? $data['contributions'][$objectType] : array();
            $contributionActions = zget($annualDataConfig['contributions'], $objectType, array_keys($objectContributions));

            $colors = $annualDataConfig['colors'];
            $detail = '';
            $items  = array();
            $maxWidth      = 0;
            $maxWidthColor = '';
            $allPercent    = 0;
            foreach($contributionActions as $actionName)
            {
                if($maxCount == 0) continue;
                if(isset($objectContributions[$actionName]))
                {
                    $color = array_shift($colors);
                    $count = $objectContributions[$actionName];
                    if($count == 0) continue;

                    $width = floor($count / $maxCount * 100);
                    if($width == 0) $width = 1;
                    $length = strlen($count);
                    if($width < $annualDataConfig['itemMinWidth'][$length]) $width = $annualDataConfig['itemMinWidth'][$length];

                    $allPercent += $width;
                    if($maxWidth < $width)
                    {
                        $maxWidth      = $width;
                        $maxWidthColor = $color;
                    }

                    $item['color'] = $color;
                    $item['width'] = $width;
                    $item['count'] = $count;
                    $items[$color] = $item;

                    $detail .= "<li><span class='color' style='background-color:{$color}'></span><span class='item-name'>" . $annualDataLang->actionList[$actionName] . "</span><span class='count'>{$count}</span></li>";
                }
            }
            if($allPercent > 100) $items[$maxWidthColor]['width'] = $items[$maxWidthColor]['width'] - ($allPercent - 100);
            if($detail) $detail = "<li><span class='header'>{$objectName}</span></li>" . $detail;
            foreach($items as $item) echo "<span class='item' style='background-color:{$item['color']};width:{$item['width']}%'>{$item['count']}</span>";
            ?>
            </span>
            <?php if($detail):?>
            <ul class='dropdown-menu'><?php echo $detail;?></ul>
            <?php endif;?>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
    </section>
    <section id='radar'>
      <header><h2 class='text-holder'><?php echo $annualDataLang->radar . $soFar;?></h2></header>
      <div id='radarCanvas'></div>
    </section>
    <section id='executionData'>
      <header><h2 class='text-holder'><?php echo $annualDataLang->executions . $soFar;?></h2></header>
      <div class='has-table'>
        <table class='table table-hover table-fixed table-borderless table-condensed'>
          <thead class='hidden'>
            <tr>
              <?php foreach($annualDataLang->executionFields as $field => $name):?>
              <th class='<?php echo "c-$field";?>'><?php echo $name;?></th>
              <?php endforeach?>
            </tr>
          </thead>
          <tbody>
            <?php foreach($data['executionStat'] as $execution):?>
            <tr>
              <?php foreach($annualDataLang->executionFields as $field => $name):?>
              <td class='<?php echo "c-$field";?>' title='<?php echo $execution->$field;?>'><?php echo $execution->$field;?></td>
              <?php endforeach?>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <div class='table-header-fixed'>
        <table class='table table-hover table-fixed table-borderless table-condensed'>
          <thead>
            <tr>
              <?php foreach($annualDataLang->executionFields as $field => $name):?>
              <th class='<?php echo "c-$field";?>'><?php echo $name;?></th>
              <?php endforeach?>
            </tr>
          </thead>
        </table>
      </div>
    </section>
    <section id='productData'>
      <header><h2 class='text-holder'><?php echo $annualDataLang->products . $soFar;?></h2></header>
      <div class='has-table'>
        <table class='table table-hover table-borderless table-condensed'>
          <thead class='hidden'>
            <tr>
              <?php foreach($annualDataLang->productFields as $field => $name):?>
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae
              <th class='<?php echo "c-$field";?>'><?php echo $name;?></th>
              <?php endforeach?>
            </tr>
          </thead>
          <tbody>
<<<<<<< HEAD
            <?php foreach($data['projectStat'] as $project):?>
            <tr>
              <?php foreach($lang->report->annualData->projectFields as $field => $name):?>
              <td class='<?php echo "c-$field";?>'><?php echo $project->$field;?></td>
=======
            <?php foreach($data['productStat'] as $product):?>
            <tr>
              <?php foreach($annualDataLang->productFields as $field => $name):?>
              <td class='<?php echo "c-$field";?>' title='<?php echo $product->$field;?>'><?php echo $product->$field;?></td>
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae
              <?php endforeach?>
            </tr>
            <?php endforeach;?>
          </tbody>
<<<<<<< HEAD
=======
        </table>
      </div>
      <div class='table-header-fixed'>
        <table class='table table-hover table-fixed table-borderless table-condensed'>
          <thead>
            <tr>
              <?php foreach($annualDataLang->productFields as $field => $name):?>
              <th class='<?php echo "c-$field";?>'><?php echo $name;?></th>
              <?php endforeach?>
            </tr>
          </thead>
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae
        </table>
      </div>
      <div class='table-header-fixed'>
    </section>
<<<<<<< HEAD
    <section id='productData'>
      <header><h2 class='text-holder'><?php echo $lang->report->annualData->products . $soFar;?></h2></header>
      <div>
        <table class='table table-hover'>
          <thead>
            <tr>
              <?php foreach($lang->report->annualData->productFields as $field => $name):?>
              <th class='<?php echo "c-$field";?>'><?php echo $name;?></th>
              <?php endforeach?>
            </tr>
          </thead>
          <tbody>
            <?php foreach($data['productStat'] as $product):?>
            <tr>
              <?php foreach($lang->report->annualData->productFields as $field => $name):?>
              <td class='<?php echo "c-$field";?>'><?php echo $product->$field;?></td>
              <?php endforeach?>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </section>
    <?php if(empty($dept) and empty($userID)):?>
    <section id='allStatusStat'>
      <header><h2 class='text-holder'><?php echo $lang->report->annualData->statusStat;?></h2></header>
      <div>
        <div class='canvas' id='allStoryStatusCanvas'></div>
        <div class='canvas' id='allTaskStatusCanvas'></div>
        <div class='canvas' id='allBugStatusCanvas'></div>
<?php
foreach($data['statusStat'] as $objectType => $objectStatusStat):?>
<span class='<?php echo $objectType;?>Overview hidden'>
<?php
$allCount    = 0;
$undoneCount = 0;
foreach($objectStatusStat as $status => $count)
{
    $allCount += $count;
    if($objectType == 'story' and $status != 'closed') $undoneCount += $count;
    if($objectType == 'task' and $status != 'done' and $status != 'closed' and $status != 'cancel') $undoneCount += $count;
    if($objectType == 'bug' and $status == 'active') $undoneCount += $count;
}
if($objectType == 'story') echo $lang->report->annualData->allStory;
if($objectType == 'task')  echo $lang->report->annualData->allTask;
if($objectType == 'bug')   echo $lang->report->annualData->allBug;
echo ' &nbsp; ' . $allCount;
echo '<br />';
echo $objectType == 'bug' ? $lang->report->annualData->unresolve : $lang->report->annualData->undone;
echo ' &nbsp; ' . $undoneCount;
?>
</span>
<?php endforeach;?>
      </div>
    </section>
    <?php endif;?>
=======
    <?php if(empty($dept) and empty($userID)):?>
    <section id='allTimeStatusStat'>
      <header><h2 class='text-holder'><?php echo $annualDataLang->statusStat;?></h2></header>
      <div>
        <div class='canvas' id='allStoryStatusCanvas'></div>
        <div class='canvas' id='allTaskStatusCanvas'></div>
        <div class='canvas' id='allBugStatusCanvas'></div>
        <?php
        foreach($data['statusStat'] as $objectType => $objectStatusStat):?>
        <div class='<?php echo $objectType;?>Overview hidden'><?php echo $this->report->getStatusOverview($objectType, $objectStatusStat);?></div>
        <?php endforeach;?>
      </div>
    </section>
    <?php endif;?>
    <?php
    $objectTypeList['story'] = $radarData['product'];
    $objectTypeList['task']  = $radarData['execution'] > $radarData['devel'] ? $radarData['execution'] : $radarData['devel'];
    $objectTypeList['bug']   = $radarData['qa'];
    $objectTypeList['case']  = $radarData['qa'];
    arsort($objectTypeList);
    ?>
    <?php foreach(array_keys($objectTypeList) as $objectType):?>
    <section class='dataYearStat' id='<?php echo $objectType;?>Data'>
      <?php if($objectType == 'story') $sectionHeader = $annualDataLang->stories;?>
      <?php if($objectType == 'task')  $sectionHeader = $annualDataLang->tasks;?>
      <?php if($objectType == 'bug')   $sectionHeader = $annualDataLang->bugs;?>
      <?php if($objectType == 'case')  $sectionHeader = $annualDataLang->cases;?>
      <?php $ucfirst = ucfirst($objectType);?>
      <header><h2 class='text-holder'><?php echo $sectionHeader . $soFar;?></h2></header>
      <div>
        <div class='canvas left' id='<?php echo $objectType == 'case' ?  "yearCaseResultCanvas" : "year{$ucfirst}StatusCanvas";?>'></div>
        <div class='canvas right' id='year<?php echo $ucfirst;?>ActionCanvas'></div>
        <?php if($objectType != 'case'):?>
        <div class='year<?php echo $ucfirst;?>Overview hidden'><?php echo $this->report->getStatusOverview($objectType, $data["{$objectType}Stat"]['statusStat']);?></div>
        <?php endif;?>
      </div>
    </section>
    <?php endforeach;?>
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae
  </main>
  <div id='loadIndicator' class='load-indicator'></div>
</div>
<?php echo js::set('exportByZentao', $annualDataLang->exportByZentao);?>
<script>
$(function()
{
    var radarChart  = echarts.init(document.getElementById('radarCanvas'));
    var radarOption = {
      tooltip: {},
      radar: {
<<<<<<< HEAD
          triggerEvent:true,
          <?php
          $max = max($radarData);
          $indicator = array();
          foreach($lang->report->annualData->radarItems as $radarKey => $radarName)
=======
          splitArea:{areaStyle:{color: ['#010419']}},
          radius:'65%',
          <?php
          $max = max($radarData);
          if($max == 0) $max = 1;
          $indicator = array();
          foreach($annualDataLang->radarItems as $radarKey => $radarName)
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae
          {
          	$indicator[$radarKey]['name'] = $radarName;
          	$indicator[$radarKey]['max']  = $max;
          }
          ?>
          indicator: <?php echo json_encode(array_values($indicator));?>
      },
      series: [{
<<<<<<< HEAD
          name:'<?php echo $lang->report->annualData->radar;?>',
          type: 'radar',
          itemStyle: {color: "rgb(247, 193, 35)"},
          data: [{value: <?php echo json_encode(array_values($radarData));?>}]
      }]
    };

    radarChart.setOption(radarOption);

    var titleTextStyle = {
        color:'#fff',
        fontSize: 16
    };
    var tooltip = {
        trigger: 'item',
        formatter: '{a} <br/>{b}: {c} ({d}%)'
    };
    var legendLeft = '0';
    var legendTop  = '25';
    var legendItemWidth = 10;
    var legendItemHeight = 10;
    var legendTextStyle = {
        color:'#fff',
        fontSize: 12
    };
    var seriesTop = '50';
    var seriesRadius = ['40%', '70%'];
    var seriesLabel = {
        color:'#fff',
        formatter: '{b}  {d}%'
    };
    var overviewCSS = {position: 'absolute', left: '180px', top: '160px'};

    var storyStatusChart  = echarts.init(document.getElementById('allStoryStatusCanvas'));
    var storyStatusOption = {
	    title: {
            text: '<?php echo $lang->report->annualData->storyStatusStat;?>',
			textStyle: titleTextStyle,
        },
        tooltip: tooltip,
        legend: {
			left: legendLeft,
			top: legendTop,
            itemWidth: legendItemWidth,
            itemHeight: legendItemHeight,
			textStyle: legendTextStyle,
            data: <?php unset($lang->story->statusList['']); echo json_encode(array_values($lang->story->statusList));?>
        },
        series: [
            {
                name: '<?php echo $lang->report->annualData->storyStatusStat;?>',
                type: 'pie',
                top: seriesTop,
                radius: seriesRadius,
                avoidLabelOverlap: false,
                label: seriesLabel,
                <?php
                $storyStatusStat = array();
                foreach($lang->story->statusList as $status => $statusName) $storyStatusStat[$status] = array('name' => $statusName, 'value' => zget($data['statusStat']['story'], $status, 0));
                ?>
                data:<?php echo json_encode(array_values($storyStatusStat));?>
            }
        ]
    }
    storyStatusChart.setOption(storyStatusOption);
    storyStatusChart.on('finished', function()
    {
        $('#allStatusStat .storyOverview').appendTo('#allStoryStatusCanvas').removeClass('hidden').css(overviewCSS);
    });

    var taskStatusChart  = echarts.init(document.getElementById('allTaskStatusCanvas'));
    var taskStatusOption = {
	    title: {
            text: '<?php echo $lang->report->annualData->taskStatusStat;?>',
			textStyle: titleTextStyle,
        },
        tooltip: tooltip,
        legend: {
			left: legendLeft,
			top: legendTop,
            itemWidth: legendItemWidth,
            itemHeight: legendItemHeight,
			textStyle: legendTextStyle,
            data: <?php unset($lang->task->statusList['']); echo json_encode(array_values($lang->task->statusList));?>
        },
        series: [
            {
                name: '<?php echo $lang->report->annualData->taskStatusStat;?>',
                type: 'pie',
                top: seriesTop,
                radius: seriesRadius,
                avoidLabelOverlap: false,
                label: seriesLabel,
                <?php
                $taskStatusStat = array();
                foreach($lang->task->statusList as $status => $statusName) $taskStatusStat[$status] = array('name' => $statusName, 'value' => zget($data['statusStat']['task'], $status, 0));
                ?>
                data:<?php echo json_encode(array_values($taskStatusStat));?>
            }
        ]
    }
    taskStatusChart.setOption(taskStatusOption);
    taskStatusChart.on('finished', function()
    {
        $('#allStatusStat .taskOverview').appendTo('#allTaskStatusCanvas').removeClass('hidden').css(overviewCSS);
    });

    var bugStatusChart  = echarts.init(document.getElementById('allBugStatusCanvas'));
    var bugStatusOption = {
	    title: {
            text: '<?php echo $lang->report->annualData->bugStatusStat;?>',
			textStyle: titleTextStyle
        },
        tooltip: tooltip,
        legend: {
			left: legendLeft,
			top: legendTop,
            itemWidth: legendItemWidth,
            itemHeight: legendItemHeight,
			textStyle: legendTextStyle,
            data: <?php unset($lang->bug->statusList['']); echo json_encode(array_values($lang->bug->statusList));?>
        },
        series: [
            {
                name: '<?php echo $lang->report->annualData->bugStatusStat;?>',
                type: 'pie',
                top: seriesTop,
                radius: seriesRadius,
                avoidLabelOverlap: false,
                label: seriesLabel,
                <?php
                $bugStatusStat = array();
                foreach($lang->bug->statusList as $status => $statusName) $bugStatusStat[$status] = array('name' => $statusName, 'value' => zget($data['statusStat']['bug'], $status, 0));
                ?>
                data:<?php echo json_encode(array_values($bugStatusStat));?>
            }
        ]
    }
    bugStatusChart.setOption(bugStatusOption);
    bugStatusChart.on('finished', function()
    {
        $('#allStatusStat .bugOverview').appendTo('#allBugStatusCanvas').removeClass('hidden').css(overviewCSS);
    });
=======
          name:'<?php echo $annualDataLang->radar;?>',
          areaStyle:{color: 'rgb(45, 40, 33)'},
          type: 'radar',
          itemStyle: {color: "#fff", borderColor:"rgb(247, 193, 35)"},
          lineStyle: {color: "rgb(247, 193, 35)"},
          data: [{value: <?php echo json_encode(array_values($radarData));?>}]
      }]
    };

    radarChart.setOption(radarOption);

    var overviewCSS = {position: 'absolute', left: '172px', top: '160px'};

    <?php unset($lang->story->statusList['']);?>
    <?php unset($lang->bug->statusList['']);?>
    <?php unset($lang->task->statusList['']);?>
    <?php if(empty($dept) and empty($userID)):?>
    <?php foreach($data['statusStat'] as $objectType => $objectStatusStat):?>
    <?php
    $statusStat = array();
    foreach($lang->$objectType->statusList as $status => $statusName)
    {
        $statusCount = zget($objectStatusStat, $status, 0);
        if($statusCount == 0) continue;
        $statusStat[$status] = array('name' => $statusName, 'value' => $statusCount);
    }
    $canvasID         = 'all' . ucfirst($objectType) . 'StatusCanvas';
    $canvasTitleKey   = $objectType . 'StatusStat';
    $jsonedStatusStat = json_encode(array_values($statusStat));
    echo "drawStatusPieChart('{$canvasID}', '{$annualDataLang->$canvasTitleKey}', $jsonedStatusStat,
        function()
        {
            $('#allTimeStatusStat .{$objectType}Overview').appendTo('#{$canvasID}').removeClass('hidden').css(overviewCSS)
        });\n";
    ?>
    <?php endforeach;?>
    <?php endif;?>

    var yearOverviewCSS = {position: 'absolute', left: '200px', top: '160px'};
    <?php foreach(array('story', 'task', 'bug', 'case') as $objectType):?>
    <?php
    $stat     = array();
    $items = $objectType == 'case' ? $lang->testcase->resultList : $lang->$objectType->statusList;
    $statKey = $objectType == 'case' ? 'resultStat' : 'statusStat';
    foreach($items as $key => $name)
    {
        $itemCount  = zget($data["{$objectType}Stat"][$statKey], $key, 0);
        if($itemCount == 0) continue;
        $stat[$key] = array('name' => $name, 'value' => $itemCount);
    }

    $ucfirst        = ucfirst($objectType);
    $canvasID       = $objectType == 'case' ? 'yearCaseResultCanvas' : 'year' . $ucfirst . 'StatusCanvas';
    $canvasTitleKey = $objectType == 'case' ? 'caseResultStat' : $objectType . 'StatusStat';
    $jsonedStat     = json_encode(array_values($stat));

    $drawFunction = "drawStatusPieChart('{$canvasID}', '{$annualDataLang->$canvasTitleKey}', $jsonedStat";
    if($objectType != 'case')
    {
        $drawFunction .= ", function()
        {
            $('#{$objectType}Data .year{$ucfirst}Overview').appendTo('#{$canvasID}').removeClass('hidden').css(yearOverviewCSS)
        }";
    }
    $drawFunction .= ");\n";

    echo $drawFunction;
    ?>
    <?php endforeach;?>

    <?php
    $commonTemplate['name']  = '';
    $commonTemplate['type']  = 'bar';
    $commonTemplate['stack'] = 'all';
    $commonTemplate['label'] = array('show' => false);
    $commonTemplate['data']  = array();

    $jsonedMonths = json_encode($months);
    foreach($annualDataConfig['month'] as $objectType => $actions):?>
    <?php
    $legends      = array();
    $monthActions = array();
    $allCount     = 0;
    foreach($actions as $actionKey => $action)
    {
        if(!isset($data["{$objectType}Stat"]['actionStat'][$actionKey])) continue;

        $actionName = $annualDataLang->actionList[$action];
        $legends[]  = $actionName;

        $monthAction = $commonTemplate;
        $monthAction['name']  = $actionName;
        $monthAction['stack'] = $objectType;
        $monthAction['data']  = array_values($data["{$objectType}Stat"]['actionStat'][$actionKey]);
        $monthActions[]       = $monthAction;

        $allCount += array_sum($monthAction['data']);
    }

    if($allCount == 0)
    {
        $monthActions = array();
        $legends = array();
    }

    $canvasID = 'year' . ucfirst($objectType) . 'ActionCanvas';
    $canvasTitleKey = $objectType . 'MonthActions';
    $legends = json_encode($legends);
    $monthActions = json_encode($monthActions);
    echo "drawMonthsBarChart('{$canvasID}', '{$annualDataLang->$canvasTitleKey}', {$legends}, {$jsonedMonths}, {$monthActions});\n";
    ?>
    <?php endforeach;?>
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae
})
</script>
<?php include '../../common/view/footer.lite.html.php';?>
