jQuery(function($)
{
	$('#true_loadmore').click(function()
	{
		if ($('#true_loadmore').find('div').hasClass('unactive'))
		{
			$('#true_loadmore').find('div').removeClass('unactive');
			$(this).text('Загружаю...'); // изменяем текст кнопки, вы также можете добавить прелоадер

			var data = {
				'action': 'loadmore',
				'query': true_posts,
				'page' : current_page,
			};

			$.ajax({
				url:ajaxurl, // обработчик
				data:data, // данные
				type:'POST', // тип запроса
				success:function(data){
					if( data ) {
						$('#true_loadmore').html('<span>Больше статей</span><div></div>'); // вставляем новые посты\
						$('#true_loadmore').find('div').addClass('unactive');
						$('#posts').before(data);
						current_page++; // увеличиваем номер страницы на единицу
						if (current_page == max_pages) $("#true_loadmore").remove(); // если последняя страница, удаляем кнопку
					} else {
						$('#true_loadmore').remove(); // если мы дошли до последней страницы постов, скроем кнопку
					}
				}
			});
		}		
	});
});