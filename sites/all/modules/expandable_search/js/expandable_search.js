(function($) {
  var searchForm = $("#search-block-form");
  var searchField = searchForm.find(".input-group");
  var searchButton = generateSearchButton();
  $(document).ready(function () {
    $("#block-search-form").css({ marginLeft: 0 });
    searchField.closest("section").append(searchButton);
    searchForm.css({ "float" : "right", width : 0 });
    searchField.css({ width: 0, "float" : "right" });
    searchField.find(".input-group-btn").hide();

    $(document).on("click", function (e) {
      if ( searchCircleWasClicked(e.target) || searchGlassWasClicked(e.target) ) {
        var searchButton = searchCircleWasClicked(e.target) ? e.target : $(e.target).closest("button");
        searchField.find(".input-group-btn").show();
        searchForm.animate({ width : "100%" });
        searchField.animate({ width : "100%" });
        $(searchButton).animate({ opacity : 0 }, function () {
          $(searchButton).css({ left: "-1000000px" });
        });
      }
    });

  });

  function searchCircleWasClicked (target) {
    return target.id === "show-search";
  }

  function searchGlassWasClicked (target) {
    return target.className.split(" ").indexOf("show-search-icon") !== -1;
  }

  function generateSearchButton() {
    var button = "<button id='show-search' class='show-search'>";
    button += "<span class='icon glyphicon glyphicon-search show-search-icon'></span>";
    button += "</button>";
    return button;
  }
})(jQuery);
