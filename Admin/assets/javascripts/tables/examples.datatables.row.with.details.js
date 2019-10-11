(function ($) {
  "use strict";

  var datatableInit = function () {
    var $table = $("#datatable-details");

    // format function for row details
    var fnFormatDetails = function (datatable, tr) {
      var data = datatable.fnGetData(tr);

      return [
        '<table class="table mb-none">',
        '<tr class="b-top-none">',
        '<td><label class="mb-none">Tanggal Transaksi:</label></td>',
        "<td>" + data[6] + "</td>",
        "</tr>",
        "<tr>",
        '<td><label class="mb-none">Waktu:</label></td>',
        "<td>" + data[7] + "</td>",
        "</tr>",
        "<tr>",
        '<td><label class="mb-none">Total Bayar:</label></td>',
        "<td>" + data[8] + "</td>",
        "</tr>",
        "<tr>",
        '<td><label class="mb-none">Diskon:</label></td>',
        "<td>" + data[9] + "</td>",
        "</tr>",
        "<tr>",
        '<td><label class="mb-none">Nama Barang:</label></td>',
        "<td>" + data[10] + "</td>",
        "</tr>",
        '<td><label class="mb-none">Jenis Penyajian:</label></td>',
        "<td>" + data[11] + "</td>",
        "</tr>",
        '<td><label class="mb-none">Nama Topping:</label></td>',
        "<td>" + data[12] + "</td>",
        "</tr>",
        '<td><label class="mb-none">Shift:</label></td>',
        "<td>" + data[13] + "</td>",
        "</tr>",
        "</div>"
      ].join("");
    };

    // insert the expand/collapse column
    var th = document.createElement("th");
    var td = document.createElement("td");
    td.innerHTML =
      '<i data-toggle class="fa fa-plus-square-o text-primary h5 m-none" style="cursor: pointer;"></i>';
    td.className = "text-center";

    $table.find("thead tr").each(function () {
      this.insertBefore(th, this.childNodes[0]);
    });

    $table.find("tbody tr").each(function () {
      this.insertBefore(td.cloneNode(true), this.childNodes[0]);
    });

    // initialize
    var datatable = $table.dataTable({
      aoColumnDefs: [
        {
          bSortable: false,
          aTargets: [0]
        }
      ],
      aaSorting: [[1, "asc"]]
    });

    // add a listener
    $table.on("click", "i[data-toggle]", function () {
      var $this = $(this),
        tr = $(this)
          .closest("tr")
          .get(0);

      if (datatable.fnIsOpen(tr)) {
        $this.removeClass("fa-minus-square-o").addClass("fa-plus-square-o");
        datatable.fnClose(tr);
      } else {
        $this.removeClass("fa-plus-square-o").addClass("fa-minus-square-o");
        datatable.fnOpen(tr, fnFormatDetails(datatable, tr), "details");
      }
    });
  };

  $(function () {
    datatableInit();
  });
}.apply(this, [jQuery]));
