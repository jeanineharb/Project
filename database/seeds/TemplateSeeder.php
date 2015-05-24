<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Template;

class TemplateSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	
	public function resetSeed(){
		DB::table('templates')->delete();
	
		// Reset auto-increment.
		$statement = "ALTER TABLE templates AUTO_INCREMENT = 1;";
		DB::unprepared($statement);
	}
	
	
	public function run()
	{
		//Model::unguard();

		$this->resetSeed();
		
		$temp = new Template;
		$temp->category = 3;
		$temp->templateName = 'Geometric Template';
		$temp->isFavorite = '1';
		$temp->isPredefined = '1';
		$temp->html = '
					<div id="header" contenteditable="true">
						<div id="headerLeft">
							<h2 id="sampleTitle">
								BIG<br> Title!
							</h2>
							<h3>
								Lorem ipsum dolor sit amet dolor duis blandit vestibulum faucibus a, tortor.
							</h3>
						</div>
						<div id="headerRight">
							<div>
								<p>
									Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies.
								</p>
								<p>
									Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor. Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac.
								</p>
							</div>
						</div>
					</div>
					<div id="columns" contenteditable="true">
						<div id="column1">
							<div>
								<h3>
									Fusce vitae porttitor
								</h3>
								<p>
									<strong>
										Lorem ipsum dolor sit amet dolor. Duis blandit vestibulum faucibus a, tortor.
									</strong>
								</p>
								<p>
									Proin nunc justo felis mollis tincidunt, risus risus pede, posuere cubilia Curae, Nullam euismod, enim. Etiam nibh ultricies dolor ac dignissim erat volutpat. Vivamus fermentum <a href="http://ckeditor.com/">nisl nulla sem in</a> metus. Maecenas wisi. Donec nec erat volutpat.
								</p>
								<blockquote>
									<p>
										Fusce vitae porttitor a, euismod convallis nisl, blandit risus tortor, pretium.
										Vehicula vitae, imperdiet vel, ornare enim vel sodales rutrum
									</p>
								</blockquote>
								<blockquote>
									<p>
										Libero nunc, rhoncus ante ipsum non ipsum. Nunc eleifend pede turpis id sollicitudin fringilla. Phasellus ultrices, velit ac arcu.
									</p>
								</blockquote>
								<p>Pellentesque nunc. Donec suscipit erat. Pellentesque habitant morbi tristique ullamcorper.</p>
								<p><s>Mauris mattis feugiat lectus nec mauris. Nullam vitae ante.</s></p>
							</div>
						</div>
						<div id="column2">
							<div>
								<h3>
									Integer condimentum sit amet
								</h3>
								<p>
									<strong>Aenean nonummy a, mattis varius. Cras aliquet.</strong>
									Praesent <a href="http://ckeditor.com/">magna non mattis ac, rhoncus nunc</a>, rhoncus eget, cursus pulvinar mollis.</p>
								<p>Proin id nibh. Sed eu libero posuere sed, lectus. Phasellus dui gravida gravida feugiat mattis ac, felis.</p>
								<p>Integer condimentum sit amet, tempor elit odio, a dolor non ante at sapien. Sed ac lectus. Nulla ligula quis eleifend mi, id leo velit pede cursus arcu id nulla ac lectus. Phasellus vestibulum. Nunc viverra enim quis diam.</p>
							</div>
							<div>
								<h3>
									Praesent wisi accumsan sit amet nibh
								</h3>
								<p>Donec ullamcorper, risus tortor, pretium porttitor. Morbi quam quis lectus non leo.</p>
								<p style="margin-left: 40px; ">Integer faucibus scelerisque. Proin faucibus at, aliquet vulputate, odio at eros. Fusce <a href="http://ckeditor.com/">gravida, erat vitae augue</a>. Fusce urna fringilla gravida.</p>
								<p>In hac habitasse platea dictumst. Praesent wisi accumsan sit amet nibh. Maecenas orci luctus a, lacinia quam sem, posuere commodo, odio condimentum tempor, pede semper risus. Suspendisse pede. In hac habitasse platea dictumst. Nam sed laoreet sit amet erat. Integer.</p>
							</div>
						</div>
					</div>
				';
		
		$temp->css = '
				<style>
						*[contenteditable="true"]{
							padding: 10px;
						}
				
						#container{
							width: 960px;
							margin: 30px auto 0;
						}
				
						#header{
							overflow: hidden;
							padding: 0 0 30px;
							border-bottom: 5px solid #05B2D2;
							position: relative;
						}
				
						#headerLeft, #headerRight{
							width: 49%;
							overflow: hidden;
						}
				
						#headerLeft{
							float: left;
							padding: 10px 1px 1px;
						}
				
						#headerLeft h2, #headerLeft h3{
							text-align: right;
							margin: 0;
							overflow: hidden;
							font-weight: normal;
						}
				
						#headerLeft h2{
							font-family: "Arial Black",arial-black;
							font-size: 4.6em;
							line-height: 1.1;
							text-transform: uppercase;
						}
				
						#headerLeft h3{
							font-size: 2.3em;
							line-height: 1.1;
							margin: .2em 0 0;
							color: #666;
						}
				
						#headerRight{
							float: right;
							padding: 1px;
						}
				
						#headerRight p{
							line-height: 1.8;
							text-align: justify;
							margin: 0;
						}
				
						#headerRight p + p{
							margin-top: 20px;
						}
				
						#headerRight > div{
							padding: 20px;
							margin: 0 0 0 30px;
							font-size: 1.4em;
							color: #666;
						}
				
						#columns{
							color: #333;
							overflow: hidden;
							padding: 20px 0;
						}
				
						#columns > div{
							float: left;
							width: 50%;
						}
				
						#columns #column1 > div{
							margin-left: 1px;
						}
				
						#columns #column2 > div{
							margin-right: 1px;
						}
				
						#columns > div > div{
							margin: 0px 10px;
							padding: 10px 20px;
						}
				
						#columns blockquote{
							margin-left: 15px;
						}
				
					</style>
				';
		$temp->save();
		
		
		$temp = new Template;
		$temp->category = 4;
		$temp->templateName = 'Apollo 11 Template';
		$temp->isFavorite = '1';
		$temp->isPredefined = '1';
		$temp->html = '
			<div id="editable" contenteditable="true">
			<h1 style="text-align: center;" > Apollo 11 </h1>
			
			<div style="padding: 5px;">
			<br/>
			<img alt="Saturn V carrying Apollo 11" class="right" src="http://tinyurl.com/maedlwu" style="height: 300px; float:right;" />
			
			<p><b>Apollo 11</b> was the spaceflight that landed the first humans, Americans <a href="http://en.wikipedia.org/wiki/Neil_Armstrong" title="Neil Armstrong">Neil Armstrong</a> and <a href="http://en.wikipedia.org/wiki/Buzz_Aldrin" title="Buzz Aldrin">Buzz Aldrin</a>, on the Moon on July 20, 1969, at 20:18 UTC. Armstrong became the first to step onto the lunar surface 6 hours later on July 21 at 02:56 UTC.</p>

			<p>Armstrong spent about <s>three and a half</s> two and a half hours outside the spacecraft, Aldrin slightly less; and together they collected 47.5 pounds (21.5&nbsp;kg) of lunar material for return to Earth. A third member of the mission, <a href="http://en.wikipedia.org/wiki/Michael_Collins_(astronaut)" title="Michael Collins (astronaut)">Michael Collins</a>, piloted the <a href="http://en.wikipedia.org/wiki/Apollo_Command/Service_Module" title="Apollo Command/Service Module">command</a> spacecraft alone in lunar orbit until Armstrong and Aldrin returned to it for the trip back to Earth.</p>
			</div>

			<h2>Broadcasting and <em>quotes</em> <a id="quotes" name="quotes"></a></h2>

			<div>
			<p>Broadcast on live TV to a world-wide audience, Armstrong stepped onto the lunar surface and described the event as:</p>

			<blockquote>
				<p>One small step for [a] man, one giant leap for mankind.</p>
			</blockquote>

			<p>Apollo 11 effectively ended the <a href="http://en.wikipedia.org/wiki/Space_Race" title="Space Race">Space Race</a> and fulfilled a national goal proposed in 1961 by the late U.S. President <a href="http://en.wikipedia.org/wiki/John_F._Kennedy" title="John F. Kennedy">John F. Kennedy</a> in a speech before the United States Congress:</p>

			<blockquote>
				<p>[...] before this decade is out, of landing a man on the Moon and returning him safely to the Earth.</p>
			</blockquote>
			</div>

			<h2>Technical details <a id="tech-details" name="tech-details"></a></h2>

			<div>
			<table border="1" bordercolor="#ccc" cellpadding="5" cellspacing="0" style="border-collapse:collapse; margin-bottom: 10px;">
				<caption><strong>Mission crew</strong></caption>
				<thead>
				<tr>
					<th scope="col">Position</th>
					<th scope="col">Astronaut</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>Commander</td>
					<td>Neil A. Armstrong</td>
				</tr>
				<tr>
					<td>Command Module Pilot</td>
					<td>Michael Collins</td>
				</tr>
				<tr>
					<td>Lunar Module Pilot</td>
					<td>Edwin &quot;Buzz&quot; E. Aldrin, Jr.</td>
				</tr>
				</tbody>
			</table>

			<p>Launched by a <strong>Saturn V</strong> rocket from <a href="http://en.wikipedia.org/wiki/Kennedy_Space_Center" title="Kennedy Space Center">Kennedy Space Center</a> in Merritt Island, Florida on July 16, Apollo 11 was the fifth manned mission of <a href="http://en.wikipedia.org/wiki/NASA" title="NASA">NASA</a>&#39;s Apollo program. The Apollo spacecraft had three parts:</p>

			<ol>
				<li><strong>Command Module</strong> with a cabin for the three astronauts which was the only part which landed back on Earth</li>
				<li><strong>Service Module</strong> which supported the Command Module with propulsion, electrical power, oxygen and water</li>
				<li><strong>Lunar Module</strong> for landing on the Moon.</li>
			</ol>

			<p>After being sent to the Moon by the Saturn V&#39;s upper stage, the astronauts separated the spacecraft from it and travelled for three days until they entered into lunar orbit. Armstrong and Aldrin then moved into the Lunar Module and landed in the <a href="http://en.wikipedia.org/wiki/Mare_Tranquillitatis" title="Mare Tranquillitatis">Sea of Tranquility</a>. They stayed a total of about 21 and a half hours on the lunar surface. After lifting off in the upper part of the Lunar Module and rejoining Collins in the Command Module, they returned to Earth and landed in the <a href="http://en.wikipedia.org/wiki/Pacific_Ocean" title="Pacific Ocean">Pacific Ocean</a> on July 24.</p>

			<hr />
			<p style="text-align: right;"><small>Source: <a href="http://en.wikipedia.org/wiki/Apollo_11">Wikipedia.org</a></small></p>
			</div>
			</div>';

		$temp->css = '<style>
			#editable{
				padding: 10px;
				float: left;
			}
			</style>';
		$temp->save();
		
	}

}
