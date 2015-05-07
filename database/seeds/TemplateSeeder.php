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
		$temp->category = 1;
		$temp->templateName = 'Template1';
		$temp->isFavorite = 'Yes';
		$temp->isPredefined = 'Yes';
		$temp->html = '
					<div id="header">
						<div id="headerLeft">
							<h2 id="sampleTitle" contenteditable="true">
								CKEditor<br> Goes Inline!
							</h2>
							<h3 contenteditable="true">
								Lorem ipsum dolor sit amet dolor duis blandit vestibulum faucibus a, tortor.
							</h3>
						</div>
						<div id="headerRight">
							<div contenteditable="true">
								<p>
									Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies.
								</p>
								<p>
									Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor. Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac.
								</p>
							</div>
						</div>
					</div>
					<div id="columns">
						<div id="column1">
							<div contenteditable="true">
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
							<div contenteditable="true">
								<h3>
									Integer condimentum sit amet
								</h3>
								<p>
									<strong>Aenean nonummy a, mattis varius. Cras aliquet.</strong>
									Praesent <a href="http://ckeditor.com/">magna non mattis ac, rhoncus nunc</a>, rhoncus eget, cursus pulvinar mollis.</p>
								<p>Proin id nibh. Sed eu libero posuere sed, lectus. Phasellus dui gravida gravida feugiat mattis ac, felis.</p>
								<p>Integer condimentum sit amet, tempor elit odio, a dolor non ante at sapien. Sed ac lectus. Nulla ligula quis eleifend mi, id leo velit pede cursus arcu id nulla ac lectus. Phasellus vestibulum. Nunc viverra enim quis diam.</p>
							</div>
							<div contenteditable="true">
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
							width: 33.3%;
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
		$temp->category = 2;
		$temp->templateName = 'Template2';
		$temp->isFavorite = 'Yes';
		$temp->isPredefined = 'Yes';
		$temp->html = '';
		$temp->css = '';
		$temp->save();
		
	}

}
