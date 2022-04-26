$(document).ready(function(){

	$('[data-bs-chart]').each(function(index, elem) {
		this.chart = new Chart($(elem), $(elem).data('bs-chart'));
	});

	AOS.init({ disable: 'mobile' });
	$('[data-bs-tooltip]').tooltip();
});
