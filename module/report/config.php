<?php
/* Open daily reminder.*/
$config->report                          = new stdclass();
$config->report->dailyreminder           = new stdclass();
$config->report->dailyreminder->bug      = true;
$config->report->dailyreminder->task     = true;
$config->report->dailyreminder->todo     = true;
$config->report->dailyreminder->testTask = true;

<<<<<<< HEAD
$config->report->annualData['minMonth'] = 2;
$config->report->annualData['colors']   = array('#0075A9', '#22AC38', '#CAAC32', '#2B4D6D', '#0071a4', '#00a0e9', '#7ecef4');
=======
$config->report->annualData['minMonth']     = 2;
$config->report->annualData['colors']       = array('#0075A9', '#22AC38', '#CAAC32', '#2B4D6D', '#0071a4', '#00a0e9', '#7ecef4');
$config->report->annualData['itemMinWidth'] = array(1 => 3, 2 => 5, 3 => 7, 4 => 9, 5 => 11);
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae

$config->report->annualData['contributions']['product']     = array('opened' => 'create', 'edited' => 'edit', 'closed' => 'close');
$config->report->annualData['contributions']['story']       = array('opened' => 'create', 'reviewed' => 'review', 'closed' => 'close', 'gitcommited' => 'gitCommit', 'svncommited' => 'svnCommit');
$config->report->annualData['contributions']['productplan'] = array('opened' => 'create');
$config->report->annualData['contributions']['release']     = array('opened' => 'create');
<<<<<<< HEAD
$config->report->annualData['contributions']['project']     = array('opened' => 'create', 'edited' => 'edit', 'started' => 'start', 'closed' => 'close');
$config->report->annualData['contributions']['task']        = array('opened' => 'create', 'assigned' => 'assign', 'finished' => 'finish', 'activated' => 'activate', 'gitcommited' => 'gitCommit', 'svncommited' => 'svnCommit');
$config->report->annualData['contributions']['bug']         = array('opened' => 'create', 'resolved' => 'resolve', 'closed' => 'close', 'activated' => 'activate', 'gitcommited' => 'gitCommit', 'svncommited' => 'svnCommit');
$config->report->annualData['contributions']['build']       = array('opened' => 'create');
$config->report->annualData['contributions']['case']        = array('opened' => 'create');
$config->report->annualData['contributions']['testtask']    = array('opened' => 'create', 'edited' => 'edit');
$config->report->annualData['contributions']['doc']         = array('opened' => 'create', 'edited' => 'edit');

$config->report->annualData['radar']['product']['create']     = 'product';
$config->report->annualData['radar']['product']['edit']       = 'product';
$config->report->annualData['radar']['story']['create']       = 'product';
$config->report->annualData['radar']['story']['edit']         = 'product';
$config->report->annualData['radar']['story']['close']        = 'product';
$config->report->annualData['radar']['productplan']['create'] = 'product';
$config->report->annualData['radar']['release']['create']     = 'product';
$config->report->annualData['radar']['project']['create']     = 'project';
$config->report->annualData['radar']['project']['edit']       = 'project';
$config->report->annualData['radar']['project']['start']      = 'project';
$config->report->annualData['radar']['project']['close']      = 'project';
$config->report->annualData['radar']['build']['create']       = 'project';
$config->report->annualData['radar']['task']['create']        = 'project';
$config->report->annualData['radar']['task']['assign']        = 'project';
$config->report->annualData['radar']['task']['close']         = 'project';
$config->report->annualData['radar']['task']['activate']      = 'project';
$config->report->annualData['radar']['task']['create']        = 'devel';
$config->report->annualData['radar']['task']['assign']        = 'devel';
$config->report->annualData['radar']['task']['close']         = 'devel';
$config->report->annualData['radar']['repo']['svnCommit']     = 'devel';
$config->report->annualData['radar']['repo']['gitCommit']     = 'devel';
$config->report->annualData['radar']['bug']['resolve']        = 'devel';
$config->report->annualData['radar']['bug']['create']         = 'qa';
$config->report->annualData['radar']['bug']['activate']       = 'qa';
$config->report->annualData['radar']['bug']['close']          = 'qa';
$config->report->annualData['radar']['case']['create']        = 'qa';
$config->report->annualData['radar']['case']['run']           = 'qa';
$config->report->annualData['radar']['testtask']['create']    = 'qa';
$config->report->annualData['radar']['testtask']['edit']      = 'qa';
=======
$config->report->annualData['contributions']['execution']   = array('opened' => 'create', 'edited' => 'edit', 'started' => 'start', 'closed' => 'close');
$config->report->annualData['contributions']['task']        = array('opened' => 'create', 'assigned' => 'assign', 'finished' => 'finish', 'activated' => 'activate', 'closed' => 'close', 'gitcommited' => 'gitCommit', 'svncommited' => 'svnCommit');
$config->report->annualData['contributions']['bug']         = array('opened' => 'create', 'resolved' => 'resolve', 'closed' => 'close', 'activated' => 'activate', 'gitcommited' => 'gitCommit', 'svncommited' => 'svnCommit');
$config->report->annualData['contributions']['build']       = array('opened' => 'create');
$config->report->annualData['contributions']['case']        = array('opened' => 'create', 'run' => 'run');
$config->report->annualData['contributions']['testtask']    = array('opened' => 'create', 'edited' => 'edit');
$config->report->annualData['contributions']['doc']         = array('created' => 'create', 'edited' => 'edit');

$config->report->annualData['radar']['product']['create']     = array('product');
$config->report->annualData['radar']['product']['edit']       = array('product');
$config->report->annualData['radar']['story']['create']       = array('product');
$config->report->annualData['radar']['story']['edit']         = array('product');
$config->report->annualData['radar']['story']['close']        = array('product');
$config->report->annualData['radar']['productplan']['create'] = array('product');
$config->report->annualData['radar']['release']['create']     = array('product');
$config->report->annualData['radar']['execution']['create']   = array('execution');
$config->report->annualData['radar']['execution']['edit']     = array('execution');
$config->report->annualData['radar']['execution']['start']    = array('execution');
$config->report->annualData['radar']['execution']['close']    = array('execution');
$config->report->annualData['radar']['build']['create']       = array('execution');
$config->report->annualData['radar']['task']['create']        = array('execution', 'devel');
$config->report->annualData['radar']['task']['assign']        = array('execution', 'devel');
$config->report->annualData['radar']['task']['close']         = array('execution', 'devel');
$config->report->annualData['radar']['task']['activate']      = array('execution');
$config->report->annualData['radar']['repo']['svnCommit']     = array('devel');
$config->report->annualData['radar']['repo']['gitCommit']     = array('devel');
$config->report->annualData['radar']['bug']['resolve']        = array('devel');
$config->report->annualData['radar']['bug']['create']         = array('qa');
$config->report->annualData['radar']['bug']['activate']       = array('qa');
$config->report->annualData['radar']['bug']['close']          = array('qa');
$config->report->annualData['radar']['case']['create']        = array('qa');
$config->report->annualData['radar']['case']['run']           = array('qa');
$config->report->annualData['radar']['testtask']['create']    = array('qa');
$config->report->annualData['radar']['testtask']['edit']      = array('qa');

$config->report->annualData['month']['story'] = array('opened' => 'create', 'activated' => 'activate', 'closed' => 'close', 'changed' => 'change');
$config->report->annualData['month']['task']  = array('opened' => 'create', 'started' => 'start', 'finished' => 'finish', 'paused' => 'pause', 'activated' => 'activate', 'canceled' => 'cancel', 'closed' => 'close');
$config->report->annualData['month']['bug']   = array('opened' => 'create', 'bugconfirmed' => 'confirm', 'activated' => 'activate', 'resolved' => 'resolve', 'closed' => 'close');
$config->report->annualData['month']['case']  = array('opened' => 'create', 'run' => 'run', 'createBug' => 'createBug');
>>>>>>> 3fe8523aba4206f083d48c90b406edee6a1e2dae
