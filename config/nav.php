<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="/">
						<img src="assets/images/logo@2x.png" width="120" alt="" />
					</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>

								
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>
			
									
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				<li>
					<a href="/">
						<i class="entypo-monitor"></i>
						<span class="title">Dashboard</span>
					</a>
				</li>
			</ul>
			
		</div>

	</div>

	<div class="main-content">
				
		<div class="row">
		
			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">
		
				<ul class="user-info pull-left pull-none-xsm">
		
					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
		
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="assets/images/<?php echo $rowUser['img'];?>" alt="" class="img-circle" width="44" />
							<?php echo $rowUser['fname'];?>
						</a>
		
						<ul class="dropdown-menu">
		
							<!-- Reverse Caret -->
							<li class="caret"></li>
		
							<!-- Profile sub-links -->
							<li>
								<a href="extra-timeline.html">
									<i class="entypo-user"></i>
									Edit Profile
								</a>
							</li>
		
							<li>
								<a href="mailbox.html">
									<i class="entypo-mail"></i>
									Inbox
								</a>
							</li>
		
							<li>
								<a href="extra-calendar.html">
									<i class="entypo-calendar"></i>
									Calendar
								</a>
							</li>
		
							<li>
								<a href="#">
									<i class="entypo-clipboard"></i>
									Tasks
								</a>
							</li>
						</ul>
					</li>
		
				</ul>
				
				<ul class="user-info pull-left pull-right-xs pull-none-xsm">
		
							
					<!-- Message Notifications -->
					<li class="notifications dropdown">
		
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="entypo-mail"></i>
							<?php if($notifcount > 0){ ?>
							<span class="badge badge-secondary"><?php echo $notifcount; ?></span>
						<?php } ?>
						</a>
		
						<ul class="dropdown-menu">
							<li>
								
								<ul class="dropdown-menu-list scroller">
								<?php while($rowNotifikasi = mysqli_fetch_assoc($resNotifikasi)){ ?>
									<li <?php if($rowNotifikasi['type'] == 1) { ?>class="active"<?php } ?>>
										<a href="kotakmasuk.php">
											<span class="image pull-right">
												<img src="assets/images/<?php 
												$uid = $rowNotifikasi['user'];
												$resPengirim = mysqli_query($conn, "SELECT * FROM admin WHERE id='$uid'");
												$rowPengirim = mysqli_fetch_assoc($resPengirim);
												 echo $rowPengirim['img']; ?>" width="44" alt="" class="img-circle" />
											</span>
											
											<span class="line">
												<strong><?php 
												echo $rowPengirim['fname'];?></strong>
												- <?php echo $rowNotifikasi['time']; ?>
											</span>
											
											<span class="line desc small">
												<?php echo $rowNotifikasi['text']; ?>
											</span>
										</a>
									</li>
							<?php } ?>	
									
								</ul>
							</li>
							
							<li class="external">
								<a href="kotakmasuk.php">All Messages</a>
							</li>
						</ul>
		
					</li>
		
							
				</ul>
		
			</div>
		
		
			<!-- Raw Links -->
			<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
				<ul class="list-inline links-list pull-right">
		
							
					<li>
						<a href="logout.php">
							Log Out <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>
		
			</div>
		
		</div>
		
		<hr />
		<?php while($rowAlert = mysqli_fetch_assoc($resAlert)){ ?>
		<script type="text/javascript">
			jQuery(document).ready(function($)
		{
			// Sample Toastr Notification
			setTimeout(function()
			{
				var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-<?php 
                        switch ($rowAlert['pos']) {
                          case 0:
                          echo "bottom-right";
                            break;
                          case 1:
                          echo "top-right";
                            break;
                          case 2:
                          echo "top-full-width";
                            break;
                          case 3:
                          echo "bottom-full-width";
                            break;
                          case 4:
                          echo "top-center";
                            break;
                          case 5:
                          echo "bottom-center";
                            break;
                        }?>" : "toast-<?php 
                        switch ($rowAlert['pos']) {
                          case 0:
                          echo "bottom-right";
                            break;
                          case 1:
                          echo "top-right";
                            break;
                          case 2:
                          echo "top-full-width";
                            break;
                          case 3:
                          echo "bottom-full-width";
                            break;
                          case 4:
                          echo "top-center";
                            break;
                          case 5:
                          echo "bottom-center";
                            break;
                        }?>",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
		
				toastr.<?php 
                        switch ($rowAlert['type']) {
                          case 0:
                          echo "info";
                            break;
                          case 1:
                          echo "warning";
                            break;
                          case 2:
                          echo "error";
                            break;
                          case 3:
                          echo "success";
                            break;
                        }?>
                      ("<?php echo $rowAlert['text']; ?>", "<?php echo $rowAlert['title']; ?>", opts);
			}, 3000);
		});
		</script>
	<?php } ?>

		
		<script type="text/javascript">
		jQuery(document).ready(function($)
		{
					
			// Sparkline Charts
			$('.inlinebar').sparkline('html', {type: 'bar', barColor: '#ff6264'} );
			$('.inlinebar-2').sparkline('html', {type: 'bar', barColor: '#445982'} );
			$('.inlinebar-3').sparkline('html', {type: 'bar', barColor: '#00b19d'} );
			$('.bar').sparkline([ [1,4], [2, 3], [3, 2], [4, 1] ], { type: 'bar' });
			$('.pie').sparkline('html', {type: 'pie',borderWidth: 0, sliceColors: ['#3d4554', '#ee4749','#00b19d']});
			$('.linechart').sparkline();
			$('.pageviews').sparkline('html', {type: 'bar', height: '30px', barColor: '#ff6264'} );
			$('.uniquevisitors').sparkline('html', {type: 'bar', height: '30px', barColor: '#00b19d'} );
		
		
			$(".monthly-sales").sparkline([1,2,3,5,6,7,2,3,3,4,3,5,7,2,4,3,5,4,5,6,3,2], {
				type: 'bar',
				barColor: '#485671',
				height: '80px',
				barWidth: 10,
				barSpacing: 2
			});
		
		
			// JVector Maps
			var map = $("#map");
		
			map.vectorMap({
				map: 'europe_merc_en',
				zoomMin: '3',
				backgroundColor: '#383f47',
				focusOn: { x: 0.5, y: 0.8, scale: 3 }
			});
		
		
		
			// Line Charts
			var line_chart_demo = $("#line-chart-demo");
		
			var line_chart = Morris.Line({
				element: 'line-chart-demo',
				data: [
					{ y: '2006', a: 100, b: 90 },
					{ y: '2007', a: 75,  b: 65 },
					{ y: '2008', a: 50,  b: 40 },
					{ y: '2009', a: 75,  b: 65 },
					{ y: '2010', a: 50,  b: 40 },
					{ y: '2011', a: 75,  b: 65 },
					{ y: '2012', a: 100, b: 90 }
				],
				xkey: 'y',
				ykeys: ['a', 'b'],
				labels: ['October 2013', 'November 2013'],
				redraw: true
			});
		
			line_chart_demo.parent().attr('style', '');
		
		
			// Donut Chart
			var donut_chart_demo = $("#donut-chart-demo");
		
			donut_chart_demo.parent().show();
		
			var donut_chart = Morris.Donut({
				element: 'donut-chart-demo',
				data: [
					{label: "Download Sales", value: getRandomInt(10,50)},
					{label: "In-Store Sales", value: getRandomInt(10,50)},
					{label: "Mail-Order Sales", value: getRandomInt(10,50)}
				],
				colors: ['#707f9b', '#455064', '#242d3c']
			});
		
			donut_chart_demo.parent().attr('style', '');
		
		
			// Area Chart
			var area_chart_demo = $("#area-chart-demo");
		
			area_chart_demo.parent().show();
		
			var area_chart = Morris.Area({
				element: 'area-chart-demo',
				data: [
					{ y: '2006', a: 100, b: 90 },
					{ y: '2007', a: 75,  b: 65 },
					{ y: '2008', a: 50,  b: 40 },
					{ y: '2009', a: 75,  b: 65 },
					{ y: '2010', a: 50,  b: 40 },
					{ y: '2011', a: 75,  b: 65 },
					{ y: '2012', a: 100, b: 90 }
				],
				xkey: 'y',
				ykeys: ['a', 'b'],
				labels: ['Series A', 'Series B'],
				lineColors: ['#303641', '#576277']
			});
		
			area_chart_demo.parent().attr('style', '');
		
		
		
		
			// Rickshaw
			var seriesData = [ [], [] ];
		
			var random = new Rickshaw.Fixtures.RandomData(50);
		
			for (var i = 0; i < 50; i++)
			{
				random.addData(seriesData);
			}
		
			var graph = new Rickshaw.Graph( {
				element: document.getElementById("rickshaw-chart-demo"),
				height: 193,
				renderer: 'area',
				stroke: false,
				preserve: true,
				series: [{
						color: '#73c8ff',
						data: seriesData[0],
						name: 'Upload'
					}, {
						color: '#e0f2ff',
						data: seriesData[1],
						name: 'Download'
					}
				]
			} );
		
			graph.render();
		
			var hoverDetail = new Rickshaw.Graph.HoverDetail( {
				graph: graph,
				xFormatter: function(x) {
					return new Date(x * 1000).toString();
				}
			} );
		
			var legend = new Rickshaw.Graph.Legend( {
				graph: graph,
				element: document.getElementById('rickshaw-legend')
			} );
		
			var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight( {
				graph: graph,
				legend: legend
			} );
		
			setInterval( function() {
				random.removeData(seriesData);
				random.addData(seriesData);
				graph.update();
		
			}, 500 );
		});
		
		
		function getRandomInt(min, max)
		{
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}
		</script>