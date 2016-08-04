@extends('frontend.partials.main')

@section('content')
	<div class="check">
		<div class="sap_tabs">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item " aria-controls="tab_item-0" role="tab"><span>Email ID</span></li>
				  	<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Informasi Pengiriman</span></li>
				  	<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Pilih Opsi Pembayaran</span></li>
				  	<div class="clearfix"></div>
				</ul>				  	 
				<div class="resp-tabs-container">
					    <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0">
					    <span class="resp-arrow"></span>Email ID</h2>
					    <div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
							<div class="facts contact-left">
							  	<form >
							    	<span>E-Mail</span>
							    	<input name="email" type="text" class="textbox">
							    	<span> 
							    		<input type="radio" name="check" id="baru" checked="checked"> Pelanggan Baru
							    	</span>
							    	<span> 
							    		<input type="radio" name="check" id="lama"> Saya sudah memiliki akun
							    	</span>
							    	<span>Password</span>
                                    <input name="password" class="textbox" type="password" id="password" disabled="disabled">
							   		<input type="submit" value="Submit">
						   		</form>
						  	</div>
					    </div>
					      <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>Additional Information</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
							<div class="facts">									
								<p > Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections </p>
								<ul >
									<li>Multimedia Systems</li>
									<li>Digital media adapters</li>
									<li>Set top boxes for HDTV and IPTV Player applications on various Operating Systems and Hardware Platforms</li>
								</ul>
					        </div>	
						</div>									
					      <h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span>Reviews</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
							 <div class="facts">
							  <p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
								<ul>
									<li>Research</li>
									<li>Design and Development</li>
									<li>Porting and Optimization</li>
									<li>System integration</li>
									<li>Verification, Validation and Testing</li>
									<li>Maintenance and Support</li>
								</ul>     
					     </div>	
					 </div>
			    </div>
			</div>
		</div>
	</div>

	@push('checkout')
	<script type="text/javascript">
		$(function(){
            $('#lama').click(function(){
                $("#password").prop("disabled", false);
                $("#login").show();
            });
            $('#baru').click(function(){
                $('#password').attr("disabled", true);
                $("#login").hide();
            });
        });
	</script>
	@endpush
@endsection