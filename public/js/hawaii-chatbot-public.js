(function( $ ) {
	'use strict';
	$(document).ready(function(){
		// Hide the existing chekkit frame
		// $('#chekkit-frame').hide();

		$('.kudu_widget #prime').click(async function(){
			if($(this).hasClass('is-visible')) {
				//already visible
				$('.kudu_form').hide();
				$('.kudu_success').hide();
				$(this).parent().find('.chat').removeClass('is-visible');
				$(this).parent().find('.chat').css({'z-index':0});
				$(this).find('.zmdi').removeClass('zmdi-close is-active is-visible');
				$(this).find('.zmdi').addClass('zmdi-comment-outline');
				$(this).removeClass('is-visible');
				$(this).removeClass('is-float');

				
				$(this).parent().find('.chat #chat_converse').show();
				$(this).parent().find('.chat .fab_field').show();
			}
			else {
				// Widget not opened, so open it.
				$(this).addClass('is-float');
				$(this).addClass('is-visible');
				$(this).find('.zmdi').removeClass('zmdi-comment-outline');
				$(this).find('.zmdi').addClass('zmdi-close is-active is-visible');
				$(this).parent().find('.chat').addClass('is-visible');
				$(this).parent().find('.chat').css({'z-index':9999});

				//Add typing animation with new chat
				if($('#chat_converse').children().length == 0) {
					await askQuestion('Hi there');
					startflow(logics);
				}
				
				
			}
		});

		var id = 0;
		
		$('#fab_send').click(function() {
			sendmessage(id);
			id++;
		});
		$('.fab_field input').on('keypress',function(e) {
			if(e.which == 13) {
				sendmessage(id);
				id++;
			}
		});

		var logics = {
			text: "Are you a RN or CAN?",
			Yes: {
				text: "Please choose an option",
				"I am a travel caregiver": {
					text: "Please choose an option",
					"I successfully completed a travel assignment prior": {
						text: "Please choose an option",
						Chat: {
							action: "chat"
						},
						"Get pre qualified": {
							action: "preq"
						}
					},
					"I did not complete a travel assignment prior": {
						text: "Please choose an option",
						"I can provide 5 good references from supervisors": {
							text: "Please choose an option",
							Chat: {
								action: "chat"
							},
							"Get pre qualified": {
								action: "preq"
							}
						},
						"I cannot provide 5 good references": {
							action: "We cannot offer you an interview at this point. Hawaii assignments have stricter conditions We are however able to offer an interview after you had your first assignment."
						}
					}
				},
				"I am a local caregiver": {
					text: "Please choose an option",
					"My license is current": {
						text: "Please choose an option",
						Chat: {
							action: "chat"
						},
						"Get pre qualified": {
							action: "prea"
						}
					},
					"My license is not current": {
						action: "Please contact <a href='http://www.prometric.com'>www.prometric.com</a> to reinstate or clear your license and contact us again after your license is current."
					}
				}
			},
			No: {
				action: "We can offer employment only to licensed RN and CAN"
			}
		}

		var curObject = JSON.parse(JSON.stringify(logics));
		
		async function startflow(obj){
			if(Object.keys(obj).includes('action')){
				if(obj.action == 'chat'){

				}
				else if(obj.action == 'prea'){

				}
				else if(obj.action == 'preq'){

				}
				else {
					askQuestion(obj.action);
				}
			}
			else {
				curObject = JSON.parse(JSON.stringify(obj));
				await askQuestion(obj.text);
				sendButtons(obj);
			}
		}

		async function askQuestion(text){
			//Add typing animation with new chat
			$('#chat_converse').append('<div class="chat_msg_item chat_msg_item_admin is_typing"><div class="chat_avatar"><img src="'+js_object.imgurl+'"></div><div class="kudu_msg"></div></div>');
			$('#chat_converse').scrollTop($('#chat_converse')[0].scrollHeight);
			await sleep(1500);
			$('.chat_msg_item_admin:last-child .kudu_msg').html(text);
			$('.is_typing').removeClass('is_typing');
		}

		function sendButtons(obj){
			
			var parent = $('<div class="option-buttons-wrapper"></div>');
			for(var i=1; i<Object.keys(obj).length; i++){
				var buttonText = Object.keys(obj)[i];
				var html = $('<button class="option-button">'+buttonText+'</button>').on('click', async function(){
					var val = $(this).text();
					var chat_id = id;
					if(val.length > 0) {
						$('.is_typing').remove();
						val = String(val);
						var time = formatAMPM(new Date);
						$('#chat_converse').append('<div class="chat_msg_item chat_msg_item_user user_chat_'+chat_id+'"></div><div class="status">'+time+'</div>');
						
						$('div.user_chat_'+chat_id).text(val);
						$('#chat_converse').scrollTop($('#chat_converse')[0].scrollHeight);
						$('.fab_field input').val("");
						
					}

					$('.option-buttons-wrapper').remove();
					id++;
					var buttonAction = curObject[val];
					await startflow(buttonAction);
				});
				parent.append(html);
			}
			
			$('#chat_converse').append(parent);
			$('#chat_converse').scrollTop($('#chat_converse')[0].scrollHeight);
		}

		function sleep(ms){
			return new Promise(function(resolve, reject){
				setTimeout(resolve, ms);
			});
		}
		

		function sendmessage(chat_id) {
			var val = $('.fab_field input').val();
			if(val.length > 0) {
				$('.is_typing').remove();
				val = String(val);
				var time = formatAMPM(new Date);
				$('#chat_converse').append('<div class="chat_msg_item chat_msg_item_user user_chat_'+chat_id+'"></div><div class="status">'+time+'</div>');
				
				$('div.user_chat_'+chat_id).text(val);
				$('#chat_converse').scrollTop($('#chat_converse')[0].scrollHeight);
				$('.fab_field input').val("");
				
			}
		}

		function formatAMPM(date) {
			var hours = date.getHours();
			var minutes = date.getMinutes();
			var ampm = hours >= 12 ? 'pm' : 'am';
			hours = hours % 12;
			hours = hours ? hours : 12; // the hour '0' should be '12'
			minutes = minutes < 10 ? '0'+minutes : minutes;
			var strTime = hours + ':' + minutes + ' ' + ampm;
			return strTime;
		}

		
		
	});
	

})( jQuery );
