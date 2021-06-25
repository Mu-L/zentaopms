<?php
/**
 * The upgrade module English file of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     upgrade
 * @version     $Id: en.php 5119 2013-07-12 08:06:42Z wyd621@gmail.com $
 * @link        http://www.zentao.net
 */
$lang->upgrade->common          = 'Upgrade';
$lang->upgrade->start           = 'Start';
$lang->upgrade->result          = 'Result';
$lang->upgrade->fail            = 'Failed';
$lang->upgrade->successTip      = 'Successed';
$lang->upgrade->success         = "<p><i class='icon icon-check-circle'></i></p><p>Congratulations!</p><p>Your ZenTao is upgraded.</p>";
$lang->upgrade->tohome          = 'Visit ZenTao';
$lang->upgrade->license         = 'ZenTao is under Z PUBLIC LICENSE(ZPL) 1.2.';
$lang->upgrade->warnning        = 'Warning!';
$lang->upgrade->checkExtension  = 'Check Extensions';
$lang->upgrade->consistency     = 'Check Consistency';
$lang->upgrade->warnningContent = <<<EOT
<p>Please backup your database before updating ZenTao!</p>
<pre>
1. Use phpMyAdmin to backup.
2. Use mysqlCommand to backup.
   $> mysqldump -u <span class='text-danger'>username</span> -p <span class='text-danger'>dbname</span> > <span class='text-danger'>filename</span>
   Change the red text into corresponding Username and Database name.
   e.g. mysqldump -u root -p zentao >zentao.bak
</pre>
EOT;

$lang->upgrade->createFileWinCMD   = 'Open command line and execute <strong style="color:#ed980f">echo > %s</strong>';
$lang->upgrade->createFileLinuxCMD = 'Execute command line: <strong style="color:#ed980f">touch %s</strong>';
$lang->upgrade->setStatusFile      = '<h4>Please complete the following actions</h4>
                                      <ul style="line-height:1.5;font-size:13px;">
                                      <li>%s</li>
                                      <li>Or delete "<strong style="color:#ed980f">%s</strong>" and create <strong style="color:#ed980f">ok.txt</strong> and leave it blank.</li>
                                      </ul>
                                      <p><strong style="color:red">I have read and done as instructed above. <a href="upgrade.php">Continue upgrading.</a></strong></p>';

$lang->upgrade->selectVersion = 'Version';
$lang->upgrade->continue      = 'Continue';
$lang->upgrade->noteVersion   = "Select the compatible version, or it might cause data loss.";
$lang->upgrade->fromVersion   = 'From';
$lang->upgrade->toVersion     = 'To';
$lang->upgrade->confirm       = 'Confirm SQL';
$lang->upgrade->sureExecute   = 'Execute';
$lang->upgrade->forbiddenExt  = 'The extension is incompatible with the version. It has been deactivated:';
$lang->upgrade->updateFile    = 'File information has to be updated.';
$lang->upgrade->noticeSQL     = 'Your database is inconsistent with the standard and it failed to fix it. Please run the following SQL and refresh.';
$lang->upgrade->afterDeleted  = 'The file is not deleted. Please refresh after you delete it.';
$lang->upgrade->mergeProgram  = 'Data Merging';
$lang->upgrade->mergeTips     = 'Data Migration Tips';
$lang->upgrade->toPMS15Guide  = 'ZenTao open source version 15.0 upgrade';
$lang->upgrade->toPRO10Guide  = 'ZenTao Pro version 10.0 upgrade';
$lang->upgrade->toBIZ5Guide   = 'ZenTao Biz version 5.0 upgrade';
$lang->upgrade->toMAXGuide    = 'ZenTao Max version upgrade';
$lang->upgrade->to15Desc      = <<<EOD
<p>ZenTao navigation and concepts are modified since version 15.0. The changes are as follows:</p>
<ol>
<p><li>Added the concept of program. A program can have multiple products and projects.</li></p>
<p><li>Subdivided the concept of project and iteration. A project can have multiple iterations.</li></p>
<p><li>The navigation has a menu on the left and supports multi-page operations.</li></p>
</ol>
<br/>
<p>You can try the latest features online and then decide whether to enable the mode: <a class='text-info' href='http://zentaomax.demo.zentao.net' target='_blank'>Demo</a></p>
</br>
<p><strong>Give it a try, the new feature/concepts in ZenTao!</strong></p>
EOD;

$lang->upgrade->mergeProgramDesc = <<<EOD
<p>Next, we will migrate the previous product and iteration to a Program and Projects under it, with the following scenario for migration.</p><br />
<h4>Option 1: Product and iteration organized by productlines </h4>
<p>It is possible to migrate the entire productline and its products and iterations to one program and its projects, although you can also migrate them separately as needed.</p>
<h4>Option 2: Iteration of product-based organizations </h4>
<p>You can select multiple products and the iterations under them to migrate to a program and its projects, or you can select a particular product and the iterations under it to migrate to a program and its projects.</p>
<h4>Option 3: Independent iterations </h4>
<p>Several iterations can be selected to migrate to one program, or independently.</p>
<h4>Option 4: Iterations linked to multiple products.</h4>
<p>These iterations can be selected to included in a new project.</p>
EOD;

$lang->upgrade->to15Mode['classic'] = 'Keep the older version';
$lang->upgrade->to15Mode['new']     = 'Try the new program  mode';

$lang->upgrade->selectedModeTips['classic'] = 'You can also switch to the new program mode in the background-Customize later.';
$lang->upgrade->selectedModeTips['new']     = 'Switching to the program mode requires data merging, and ZenTao will guide you through it.';

$lang->upgrade->line         = 'Product Line';
$lang->upgrade->program      = 'Merge Project';
$lang->upgrade->existProgram = 'Existing programs';
$lang->upgrade->existProject = 'Existing projects';
$lang->upgrade->existLine    = 'Existing' . $lang->productCommon . ' lines';
$lang->upgrade->product      = $lang->productCommon;
$lang->upgrade->project      = 'Iteration';
$lang->upgrade->repo         = 'Repo';
$lang->upgrade->mergeRepo    = 'Merge Repo';

$lang->upgrade->newProgram         = 'Create';
$lang->upgrade->projectEmpty       = 'Project must be not empty.';
$lang->upgrade->mergeSummary       = "There are %s products and %s iterations in your ZenTao system waiting for merging. Your migration plan is recommended based on the data in ZenTao below, and you can also change it according to your situation:";
$lang->upgrade->mergeByProductLine = "PRODUCTLINE-BASED iterations: Consolidate the entire product line and the products and iterations below it into one program.";
$lang->upgrade->mergeByProduct     = "PRODUCT-BASED iterations: You can select multiple products and their iterations to merge into a program, or you can select a product to merge its iterations into a program.";
$lang->upgrade->mergeByProject     = "Independent iterations: You can select several iterations and merge them into one program, or merge them independently";
$lang->upgrade->mergeByMoreLink    = "Iteration lined to multiple products: select the product that the iteration belongs to.";
$lang->upgrade->mergeRepoTips      = "Merge the selected repository under the selected product.";
$lang->upgrade->needBuild4Add      = 'Full text retrieval has been added in this upgrade. You need to create an index. Please go [Admin->System->BuildIndex] page to build index.';

include dirname(__FILE__) . '/version.php';
