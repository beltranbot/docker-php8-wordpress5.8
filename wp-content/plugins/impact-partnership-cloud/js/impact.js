jQuery(document).ready(function () {

  jQuery(".impact-exist-user").click(function () {
      jQuery(".impact-form").toggleClass("impact-hidden impact-unhidden");
      jQuery(".impact-user").addClass("impact-hidden");
  });

  jQuery("#exampleModal").modal("show");
});
