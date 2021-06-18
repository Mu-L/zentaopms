<?php
/**
 * The create stakeholder view of project module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     product
 * @version     $Id: browse.html.php 5096 2013-07-11 07:02:43Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php js::set('projectID', $projectID);?>
<?php $path = str_replace(",{$projectID},", ',', "{$project->path}");?>
<div id='mainMenu' class='clearfix'>
  <div class='btn-toolbar pull-left'>
    <span class='btn btn-link btn-active-text'>
      <?php echo html::a($this->createLink('project', 'craetestakeholder', "projectID={$projectID}"), "<span class='text'> {$lang->project->createStakeholder}</span>");?>
    </span>
    <div class='input-group space w-200px'>
      <span class='input-group-addon'><?php echo $lang->project->selectDept?></span>
      <?php echo html::select('dept', $depts, $dept, "class='form-control chosen' onchange='setDeptUsers(this)' data-placeholder='{$lang->project->selectDeptTitle}'");?>
    </div>
    <?php if($project->parent):?>
    <?php echo html::a($this->createLink('project', 'createStakeholder', "projectID=$projectID&dept=&parent=$path"), $lang->project->importStakeholder, '', 'class="btn btn-primary"');?>
    <?php endif;?>
  </div>
</div>
<div id='mainContent' class='main-content'>
  <form class='main-form' method='post' id='teamForm' target='hiddenwin'>
    <table class='table table-form'>
      <thead>
        <tr class='text-center'>
          <th><?php echo $lang->team->account;?></th>
          <th class="w-90px"> <?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($stakeholders as $stakeholder):?>
        <?php if(!isset($users[$stakeholder->account])) continue;?>
        <?php unset($users[$stakeholder->account]);?>
        <tr>
          <td>
            <input type='text' name='realnames[]' value='<?php echo $stakeholder->realname;?>' readonly class='form-control' />
            <input type='hidden' name='accounts[]' value='<?php echo $stakeholder->account;?>' />
          </td>
          <td class='c-actions text-center'>
            <a href='javascript:;' onclick='addItem(this)' class='btn btn-link'><i class='icon-plus'></i></a>
            <a href='javascript:;' onclick='deleteItem(this)' class='btn btn-link'><i class='icon icon-close'></i></a>
          </td>
        </tr>
        <?php endforeach;?>

        <?php foreach($parentStakeholders as $stakeholder):?>
        <?php if(!isset($users[$stakeholder->account])) continue;?>
        <tr>
          <td><?php echo html::select("accounts[]", $users, $stakeholder->account, "class='form-control chosen'");?></td>
          <td class='c-actions text-center'>
            <a href='javascript:;' onclick='addItem(this)' class='btn btn-link'><i class='icon-plus'></i></a>
            <a href='javascript:;' onclick='deleteItem(this)' class='btn btn-link'><i class='icon icon-close'></i></a>
          </td>
        </tr>
        <?php endforeach;?>

        <?php foreach($deptUsers as $deptAccount => $userName):?>
        <?php if(!isset($users[$deptAccount])) continue;?>
        <tr class='addedItem'>
          <td><?php echo html::select("accounts[]", $users, $deptAccount, "class='form-control chosen'");?></td>
          <td class='c-actions text-center'>
            <a href='javascript:;' onclick='addItem(this)' class='btn btn-link'><i class='icon-plus'></i></a>
            <a href='javascript:;' onclick='deleteItem(this)' class='btn btn-link'><i class='icon icon-close'></i></a>
          </td>
        </tr>
        <?php unset($users[$deptAccount]);?>
        <?php endforeach;?>

        <?php for($j = 0; $j < 5; $j ++):?>
        <tr class='addedItem'>
          <td><?php echo html::select("accounts[]", $users, '', "class='form-control chosen'");?></td>
          <td class='c-actions text-center'>
            <a href='javascript:;' onclick='addItem(this)' class='btn btn-link'><i class='icon-plus'></i></a>
            <a href='javascript:;' onclick='deleteItem(this)' class='btn btn-link'><i class='icon icon-close'></i></a>
          </td>
        </tr>
        <?php endfor;?>
      </tbody>
      <tfoot><tr><td colspan='6' class='text-center form-actions'><?php echo html::submitButton() . ' ' . html::backButton(); ?></td></tr></tfoot>
    </table>
  </form>
</div>
<div>
  <table class='hidden'>
    <tr id='addItem' class='hidden'>
      <td><?php echo html::select("accounts[]", $users, '', "class='form-control'");?></td>
      <td class='c-actions text-center'>
        <a href='javascript:;' onclick='addItem(this)' class='btn btn-link'><i class='icon-plus'></i></a>
        <a href='javascript:;' onclick='deleteItem(this)' class='btn btn-link'><i class='icon icon-close'></i></a>
      </td>
    </tr>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
