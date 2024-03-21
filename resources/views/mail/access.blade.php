{{-- @component('mail::message')
# ¡Buen día, {{ $data['name'] }}!
# Bienvenido al sistema {{ config('app.name') }}
Has sido registrado con los siguientes datos:
<br>
Usuario: {{ $data['email'] }}
<br>
Password: {{ $data['password'] }}
<br>
@component('mail::button', ['url' => $data["urlEmail"], 'color' => 'green'])
    Acceder con un click
@endcomponent
O acceder con tus datos:
@component('mail::button', ['url' => $url, 'color' => 'blue'])
    Acceder
@endcomponent
Si quieres reportar algún error, hacer una pregunta o solicitar una característica nueva, puedes hacerlo desde aquí:
@component('mail::button', ['url' => 'https://forms.gle/YjbAwnELxm8WxRxQ7', 'color' => 'red'])
    Centro de Ayuda
@endcomponent
Gracias,<br>
{{ config('app.name') }}
<hr>
Si tienes problemas para visualizar el boton, puedes hacer click en el siguiente enlace: <a href="{{$data["urlEmail"]}}">{{$data["urlEmail"]}}</a>
@endcomponent --}}


<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: inherit !important;
		}

		#MessageViewBody a {
			color: inherit;
			text-decoration: none;
		}

		p {
			line-height: inherit
		}

		.desktop_hide,
		.desktop_hide table {
			mso-hide: all;
			display: none;
			max-height: 0px;
			overflow: hidden;
		}

		.image_block img+div {
			display: none;
		}

		@media (max-width:520px) {

			.desktop_hide table.icons-inner,
			.social_block.desktop_hide .social-table {
				display: inline-block !important;
			}

			.icons-inner {
				text-align: center;
			}

			.icons-inner td {
				margin: 0 auto;
			}

			.image_block div.fullWidth {
				max-width: 100% !important;
			}

			.mobile_hide {
				display: none;
			}

			.row-content {
				width: 100% !important;
			}

			.stack .column {
				width: 100%;
				display: block;
			}

			.mobile_hide {
				min-height: 0;
				max-height: 0;
				max-width: 0;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide,
			.desktop_hide table {
				display: table !important;
				max-height: none !important;
			}
		}
	</style>
</head>

<body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
	<table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;">
		<tbody>
			<tr>
				<td>
					<table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f5f5f5;">
						<tbody>
							<tr>
								<td>
                                </td>
                                <td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 500px; margin: 0 auto;" width="500">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 20px; padding-top: 15px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad" style="text-align:center;width:100%;">
																<h1 style="margin: 0; color: #393d47; direction: ltr; font-family: Tahoma, Verdana, Segoe, sans-serif; font-size: 45px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 30px;" ><strong>{{ config('app.name') }}</strong></h1>
															</td>
														</tr>
													</table>
													<table class="heading_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad" style="text-align:center;width:100%;">
																<h2 style="margin: 0; color: #393d47; direction: ltr; font-family: Tahoma, Verdana, Segoe, sans-serif; font-size: 25px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 30px;" ><strong>Bienvenido al sistema {{ config('app.name') }}</strong></h2>
															</td>
														</tr>
													</table>
													<table class="paragraph_block block-3" width="100%" border="0" cellpadding="10" cellspacing="10" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td class="pad">
																<div style="color:#393d47;font-family:Tahoma,Verdana,Segoe,sans-serif;font-size:14px;line-height:150%;text-align:center;mso-line-height-alt:21px;">
																	<p style="margin: 0; word-break: break-word;"><span><span>Has sido registrado con los siguientes datos:
                                                                        <br>
                                                                        Usuario: {{ $data['email'] }} </span><span><br>
                                                                        Password: {{ $data['password'] }}
                                                                        <br></span></span></p>
																</div>
															</td>
														</tr>
													</table>
													<table class="button_block block-4" width="100%" border="0" cellpadding="15" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad">
                                                                <div class="alignment" align="center">
                                                                    <!--[if mso]>
                                                                    <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{$data["urlEmail"]}}" style="height:62px;width:274px;v-text-anchor:middle;" arcsize="35%" strokeweight="0.75pt" strokecolor="#FFC727" fillcolor="#5cb85c">
                                                                    <w:anchorlock/>
                                                                    <v:textbox inset="0px,0px,0px,0px">
                                                                    <center style="color:#ffffff; font-family:Tahoma, Verdana, sans-serif; font-size:18px">
                                                                    <![endif]-->
                                                                    <a href="{{$data["urlEmail"]}}" target="_blank" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#5cb85c;border-radius:20px;width:auto;border-top:1px solid #5cb85c;font-weight:undefined;border-right:1px solid #5cb85c;border-bottom:1px solid #5cb85c;border-left:1px solid #5cb85c;padding-top:10px;padding-bottom:10px;font-family:Tahoma, Verdana, Segoe, sans-serif;font-size:18px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:50px;padding-right:50px;font-size:18px;display:inline-block;letter-spacing:normal;"><span style="word-break:break-word;"><span style="line-height: 36px;" data-mce-style><strong>Acceder con un click</strong></span></span></span></a>
                                                                    <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                                                                </div>
                                                            </td>
														</tr>
													</table>
                                                    <table class="paragraph_block block-3" width="100%" border="0" cellpadding="10" cellspacing="10" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td class="pad">
																<div style="color:#393d47;font-family:Tahoma,Verdana,Segoe,sans-serif;font-size:14px;line-height:150%;text-align:center;mso-line-height-alt:21px;">
																	<p style="margin: 0; word-break: break-word;"><span><span>O acceder con tus datos:
																</div>
															</td>
														</tr>
													</table>
													<table class="button_block block-4" width="100%" border="0" cellpadding="15" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
                                                            <td class="pad">
                                                                <div class="alignment" align="center">
                                                                    <!--[if mso]>
                                                                    <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{$url}}" style="height:62px;width:274px;v-text-anchor:middle;" arcsize="35%" strokeweight="0.75pt" strokecolor="#FFC727" fillcolor="#000000">
                                                                    <w:anchorlock/>
                                                                    <v:textbox inset="0px,0px,0px,0px">
                                                                    <center style="color:#ffffff; font-family:Tahoma, Verdana, sans-serif; font-size:18px">
                                                                    <![endif]-->
                                                                    <a href="{{$url}}" target="_blank" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#000000;border-radius:20px;width:auto;border-top:1px solid #000000;font-weight:undefined;border-right:1px solid #000000;border-bottom:1px solid #000000;border-left:1px solid #000000;padding-top:10px;padding-bottom:10px;font-family:Tahoma, Verdana, Segoe, sans-serif;font-size:18px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:50px;padding-right:50px;font-size:18px;display:inline-block;letter-spacing:normal;"><span style="word-break:break-word;"><span style="line-height: 36px;" data-mce-style><strong>Acceder</strong></span></span></span></a>
                                                                    <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                                                                </div>
                                                            </td>
														</tr>
													</table>
                                                    <hr>
                                                    <table class="paragraph_block block-3" width="100%" border="0" cellpadding="10" cellspacing="10" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td class="pad">
																<div style="color:#393d47;font-family:Tahoma,Verdana,Segoe,sans-serif;font-size:14px;line-height:150%;text-align:center;mso-line-height-alt:21px;">
																	<p style="margin: 0; word-break: break-word;"><span><span>Si tienes problemas para visualizar el boton, puedes hacer click en el siguiente enlace:
																</div>
															</td>
														</tr>
													</table>
													<table class="button_block block-4" width="100%" border="0" cellpadding="15" cellspacing="15" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad">
																<p>{{$data["urlEmail"]}}</p>
															</td>
														</tr>
													</table>
													<table class="paragraph_block block-5" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td class="pad" style="padding-bottom:5px;padding-left:10px;padding-right:10px;padding-top:10px;">
																<div style="color:#393d47;font-family:Tahoma,Verdana,Segoe,sans-serif;font-size:13px;line-height:150%;text-align:center;mso-line-height-alt:19.5px;">
																	<p style="margin: 0; word-break: break-word;"><span>If you didn’t request to change your password, simply ignore this email.</span></p>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f5f5f5;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px; margin: 0 auto;" width="500">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-4" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px; margin: 0 auto;" width="500">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="html_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad">
																<div style="font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;" align="center"><div style="height:30px;">&nbsp;</div></div>
															</td>
														</tr>
													</table>
													<table class="social_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad" style="text-align:center;padding-right:0px;padding-left:0px;">
																<div class="alignment" align="center">
																	<table class="social-table" width="168px" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block;">
																		<tr>
																			<td style="padding:0 5px 0 5px;"><a href="https://www.facebook.com" target="_blank"><img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-outline-circle-default-gray/facebook@2x.png" width="32" height="32" alt="Facebook" title="Facebook" style="display: block; height: auto; border: 0;"></a></td>
																			<td style="padding:0 5px 0 5px;"><a href="https://www.twitter.com" target="_blank"><img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-outline-circle-default-gray/twitter@2x.png" width="32" height="32" alt="Twitter" title="Twitter" style="display: block; height: auto; border: 0;"></a></td>
																			<td style="padding:0 5px 0 5px;"><a href="https://www.instagram.com" target="_blank"><img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-outline-circle-default-gray/instagram@2x.png" width="32" height="32" alt="Instagram" title="Instagram" style="display: block; height: auto; border: 0;"></a></td>
																			<td style="padding:0 5px 0 5px;"><a href="https://www.linkedin.com" target="_blank"><img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/t-outline-circle-default-gray/linkedin@2x.png" width="32" height="32" alt="LinkedIn" title="LinkedIn" style="display: block; height: auto; border: 0;"></a></td>
																		</tr>
																	</table>
																</div>
															</td>
														</tr>
													</table>
													<table class="html_block block-3" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad">
																<div style="font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;" align="center"><div style="margin-top: 25px;border-top:1px dashed #D6D6D6;margin-bottom: 20px;"></div></div>
															</td>
														</tr>
													</table>
													<table class="paragraph_block block-4" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td class="pad">
																<div style="color:#C0C0C0;font-family:Tahoma,Verdana,Segoe,sans-serif;font-size:12px;line-height:120%;text-align:center;mso-line-height-alt:14.399999999999999px;">
																	{{-- <p style="margin: 0; word-break: break-word;">Duis euismod neque at lacus rutrum, nec suscipit eros tincidunt nterdum et malesuada.</p>
																	<p style="margin: 0; word-break: break-word;">Fames ac ante ipsum vestibulum.</p> --}}
																	<p style="margin: 0; word-break: break-word;">&nbsp;</p>
																	<p style="margin: 0; word-break: break-word;">Your Street 12, 34567 AB City&nbsp; /&nbsp;&nbsp;https://sazone.promolife.lat /&nbsp;(+1) 123 456 789<a href="https://sazone.promolife.lat" style="color: #0068A5;"></a></p>
																	<p style="margin: 0; word-break: break-word;"><span style="color:#c0c0c0;">&nbsp;</span></p>
																</div>
															</td>
														</tr>
													</table>
													<table class="html_block block-5" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad">
																<div style="font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;" align="center"><div style="height-top: 20px;">&nbsp;</div></div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-5" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 500px; margin: 0 auto;" width="500">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="icons_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad" style="vertical-align: middle; color: #1e0e4b; font-family: 'Inter', sans-serif; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;">
																<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
																	<tr>
																		<td class="alignment" style="vertical-align: middle; text-align: center;">
                                                                            <p>© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
                                                                            </p>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>