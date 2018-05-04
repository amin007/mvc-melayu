		<div class="side-menu-container">
			<div class="navbar-header">
			<a class="navbar-brand" href="#">
			<div class="icon fa fa-paper-plane"></div>
			<div class="title">Flat Admin V.2</div>
			</a>
			<button type="button" class="navbar-expand-toggle pull-right visible-xs">
			<i class="fa fa-times icon"></i>
			</button>
			</div>

			<ul class="nav navbar-nav">
			<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
			<li class="active">
				<a href="index.html">
				<span class="icon fa fa-tachometer"></span><span class="title">Dashboard</span>
				</a>
			</li>
			<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
			<li class="panel panel-default dropdown">
				<a data-toggle="collapse" href="#dropdown-element">
					<span class="icon fa fa-desktop"></span><span class="title">UI Kits</span>
				</a>
				<!-- Dropdown level 1 -->
				<div id="dropdown-element" class="panel-collapse collapse">
					<div class="panel-body">
						<ul class="nav navbar-nav">
						<li><a href="<?=$url?>html/ui-kits/theming.html">Theming</a></li>
						<li><a href="<?=$url?>html/ui-kits/grid.html">Grid</a></li>
						<li><a href="<?=$url?>html/ui-kits/button.html">Buttons</a></li>
						<li><a href="<?=$url?>html/ui-kits/card.html">Cards</a></li>
						<li><a href="<?=$url?>html/ui-kits/list.html">Lists</a></li>
						<li><a href="<?=$url?>html/ui-kits/modal.html">Modals</a></li>
						<li><a href="<?=$url?>html/ui-kits/alert.html">Alerts & Toasts</a></li>
						<li><a href="<?=$url?>html/ui-kits/panel.html">Panels</a></li>
						<li><a href="<?=$url?>html/ui-kits/loader.html">Loaders</a></li>
						<li><a href="<?=$url?>html/ui-kits/step.html">Tabs & Steps</a></li>
						<li><a href="<?=$url?>html/ui-kits/other.html">Other</a></li>
						</ul>
					</div>
				</div><!-- / panel-collapse collapse -->
			</li>
			<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
			<li class="panel panel-default dropdown">
				<a data-toggle="collapse" href="#dropdown-table">
				<span class="icon fa fa-table"></span><span class="title">Table</span>
				</a>
				<!-- Dropdown level 1 -->
				<div id="dropdown-table" class="panel-collapse collapse">
					<div class="panel-body">
						<ul class="nav navbar-nav">
							<li><a href="<?=$url?>html/table/table.html">Table</a></li>
							<li><a href="<?=$url?>html/table/datatable.html">Datatable</a></li>
						</ul>
					</div>
				</div>
			</li>
			<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
			<li class="panel panel-default dropdown">
				<a data-toggle="collapse" href="#dropdown-form">
					<span class="icon fa fa-file-text-o"></span><span class="title">Form</span>
				</a>
				<!-- Dropdown level 1 -->
				<div id="dropdown-form" class="panel-collapse collapse">
					<div class="panel-body">
						<ul class="nav navbar-nav">
							<li><a href="<?=$url?>html/form/ui-kits.html">Form UI Kits</a></li>
						</ul>
					</div>
				</div>
			</li>
			<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
			<!-- Dropdown-->
			<li class="panel panel-default dropdown">
				<a data-toggle="collapse" href="#component-example">
				<span class="icon fa fa-cubes"></span><span class="title">Components</span>
				</a>
				<!-- Dropdown level 1 -->
				<div id="component-example" class="panel-collapse collapse">
					<div class="panel-body">
						<ul class="nav navbar-nav">
							<li><a href="<?=$url?>html/components/pricing-table.html">Pricing Table</a></li>
							<li><a href="<?=$url?>html/components/chartjs.html">Chart.JS</a></li>
						</ul>
					</div>
				</div>
			</li>
		<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
			<!-- Dropdown-->
			<li class="panel panel-default dropdown">
				<a data-toggle="collapse" href="#dropdown-example">
					<span class="icon fa fa-slack"></span><span class="title">Page Example</span>
				</a>
				<!-- Dropdown level 1 -->
				<div id="dropdown-example" class="panel-collapse collapse">
					<div class="panel-body">
						<ul class="nav navbar-nav">
							<li><a href="<?=$url?>html/pages/login.html">Login</a></li>
							<li><a href="<?=$url?>html/pages/index.html">Landing Page</a></li>
						</ul>
					</div>
				</div>
			</li>
			<!-- Dropdown-->
			<li class="panel panel-default dropdown">
				<a data-toggle="collapse" href="#dropdown-icon">
				<span class="icon fa fa-archive"></span><span class="title">Icons</span>
				</a>
				<!-- Dropdown level 1 -->
				<div id="dropdown-icon" class="panel-collapse collapse">
					<div class="panel-body">
						<ul class="nav navbar-nav">
							<li><a href="<?=$url?>html/icons/glyphicons.html">Glyphicons</a></li>
							<li><a href="<?=$url?>html/icons/font-awesome.html">Font Awesomes</a></li>
						</ul>
					</div>
				</div>
			</li>
			<li>
				<a href="<?=$url?>html/license.html">
					<span class="icon fa fa-thumbs-o-up"></span><span class="title">License</span>
				</a>
			</li>
			</ul>
		</div>