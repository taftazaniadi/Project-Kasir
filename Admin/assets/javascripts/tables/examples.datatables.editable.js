$(".remove-row").prop("disabled", true);
$(".edit-row").prop("disabled", true);
localStorage.setItem("statekirim", 1);
(function($) {
  $("input[type=checkbox]").prop("checked", false);
  ("use strict");
  $(".kk").addClass("sorting_disabled");
  var EditableTable = {
    options: {
      addButton: "#addToTable",
      table: "#datatable-editable",
      dialog: {
        wrapper: "#dialog",
        cancelButton: "#dialogCancel",
        confirmButton: "#dialogConfirm"
      }
    },

    initialize: function() {
      this.setVars()
        .build()
        .events();
    },

    setVars: function() {
      this.$table = $(this.options.table);
      this.$addButton = $(this.options.addButton);

      // dialog
      this.dialog = {};
      this.dialog.$wrapper = $(this.options.dialog.wrapper);
      this.dialog.$cancel = $(this.options.dialog.cancelButton);
      this.dialog.$confirm = $(this.options.dialog.confirmButton);

      return this;
    },

    build: function() {
      this.datatable = this.$table.DataTable({
        aoColumns: [
          null,
          null,
          null,
          null,
          null,
          null,
          null,
          null,
          { bSortable: false }
        ]
      });

      window.dt = this.datatable;

      return this;
    },

    events: function() {
      var _self = this;

      this.$table
        .on("click", "a.save-row", function(e) {
          e.preventDefault();
          //insert
          document.cookie =
            "idstaff=" +
            $(".fai")
              .children("td:eq(1)")
              .children()
              .val();
          document.cookie =
            "namastaff=" +
            $(".fai")
              .children("td:eq(2)")
              .children()
              .val();
          document.cookie =
            "userstaff=" +
            $(".fai")
              .children("td:eq(3)")
              .children()
              .val();
          document.cookie =
            "passstaff=" +
            $(".fai")
              .children("td:eq(4)")
              .children()
              .val();
          document.cookie =
            "kontakstaff=" +
            $(".fai")
              .children("td:eq(5)")
              .children()
              .val();
          document.cookie =
            "alamatstaff=" +
            $(".fai")
              .children("td:eq(6)")
              .children()
              .val();
          document.cookie =
            "emailstaff=" +
            $(".fai")
              .children("td:eq(7)")
              .children()
              .val();
          if (localStorage.statekirim == 2) {
            document.cookie = "status=update";
          } else {
            document.cookie = "status=insert";
          }
          window.location.replace("query");
          _self.rowSave($(this).closest("tr"));
        })
        .on("click", "a.cancel-row", function(e) {
          e.preventDefault();
          _self.rowCancel($(this).closest("tr"));
        })
        .on("click", "a.edit-row", function(e) {
          e.preventDefault();

          localStorage.statekirim = 2;
          _self.rowEdit($(this).closest("tr"));
        })
        .on("click", "a.remove-row", function(e) {
          e.preventDefault();
          var $row = $(this).closest("tr");
          $.magnificPopup.open({
            items: {
              src: "#dialog",
              type: "inline"
            },
            preloader: false,
            modal: true,
            callbacks: {
              change: function() {
                _self.dialog.$confirm.on("click", function(e) {
                  e.preventDefault();
                  _self.rowRemove($row);
                  $.magnificPopup.close();
                });
              },
              close: function() {
                _self.dialog.$confirm.off("click");
              }
            }
          });
        });
      $(".cek").click(() => {
        var tstatus = 0;
        $(".ff").prop("checked", false);
        $(".ff")
          .parent()
          .parent()
          .children(".actions")
          .html("");
        $(".cek.ff").removeClass("ff");

        $(".cek:checked").addClass("ff");
        $(".cek.ff")
          .parent()
          .parent()
          .children(".actions")
          .html(`<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
				<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
				<a href="#edit-row" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
				<a href="#remove-row" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>`);
        if (
          $(".cek:checked")
            .parent()
            .parent()
            .children("td:eq(1)")
            .html() != undefined
        ) {
          localStorage.setItem(
            "namahapus",
            $(".cek:checked")
              .parent()
              .parent()
              .children("td:eq(2)")
              .html()
          );
          localStorage.setItem(
            "idhapus",
            $(".cek:checked")
              .parent()
              .parent()
              .children("td:eq(1)")
              .html()
          );
          document.cookie = "idhapus=" + localStorage.idhapus;

          $(".cek.ff:checked")
            .parent()
            .parent()
            .children("td:eq(8)")
            .children(".remove-row")
            .click(() => {
              $(".isinotif").html(
                "Are you sure want to delete " +
                  localStorage.idhapus +
                  " - " +
                  localStorage.namahapus +
                  "?"
              );
              $.magnificPopup.open({
                items: {
                  src: "#dialog",
                  type: "inline"
                },
                preloader: false,
                modal: true,
                callbacks: {
                  change: function() {
                    _self.dialog.$confirm.on("click", function(e) {
                      e.preventDefault();
                      document.cookie = "status=hapus";
                      window.location.replace("query");
                      _self.rowRemove($(this).closest("tr"));
                      $.magnificPopup.close();
                    });
                    _self.dialog.$cancel.on("click", function(e) {
                      e.preventDefault();
                      window.location.replace("Data_Karyawan");
                    });
                  },
                  close: function() {
                    _self.dialog.$confirm.off("click");
                  }
                }
              });
            });
          $(".cek:checked")
            .parent()
            .parent()
            .children("td:eq(8)")
            .children(".edit-row")
            .prop("disabled", false);
        }
      });
      this.$addButton.on("click", function(e) {
        e.preventDefault();
        _self.rowAdd();
        setTimeout(() => {
          $("tr").removeClass("fai");
          $("tr:eq(1)")
            .children("td:eq(1)")
            .children()
            .val(localStorage.NewID);
          $("tr:eq(1)")
            .children("td:eq(0)")
            .children()
            .attr("readonly", "true");
          $("tr:eq(1)")
            .children("td:eq(1)")
            .children()
            .attr("readonly", "true");
          $("tr:eq(1)").addClass("fai");
        }, 1);
      });

      this.dialog.$cancel.on("click", function(e) {
        e.preventDefault();
        $.magnificPopup.close();
        window.location.replace("Data_Karyawan");
      });

      return this;
    },

    // ==========================================================================================
    // ROW FUNCTIONS
    // ==========================================================================================
    rowAdd: function() {
      this.$addButton.attr({ disabled: "disabled" });

      var actions, data, $row;

      actions = [
        '<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>',
        '<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>',
        '<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>',
        '<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>'
      ].join(" ");

      data = this.datatable.row.add(["", "", "", "", "", "", "", "", actions]);
      $row = this.datatable
        .row(data[0])
        .nodes()
        .to$();

      $row
        .addClass("adding")
        .find("td:last")
        .addClass("actions");

      this.rowEdit($row);

      this.datatable.order([0, "asc"]).draw(); // always show fields
    },

    rowCancel: function($row) {
      // var _self = this,
      // 	$actions,
      // 	i,
      // 	data;

      // if ($row.hasClass('adding')) {
      // 	this.rowRemove($row);
      // } else {

      // 	data = this.datatable.row($row.get(0)).data();
      // 	this.datatable.row($row.get(0)).data(data);

      // 	$actions = $row.find('td.actions');
      // 	if ($actions.get(0)) {
      // 		this.rowSetActionsDefault($row);
      // 	}

      // 	this.datatable.draw();
      // }
      window.location.replace("Data_Karyawan");
    },

    rowEdit: function($row) {
      var _self = this,
        data;

      data = this.datatable.row($row.get(0)).data();
      $row.addClass("fai");
      $row.children("td").each(function(i) {
        var $this = $(this);

        if ($this.hasClass("actions") || $this.hasClass("divcek")) {
          _self.rowSetActionsEditing($row);
        } else if ($this.hasClass("aidi")) {
          $this.html(
            '<input type="text" readonly="true" class="edit form-control input-block" value="' +
              data[i] +
              '"/>'
          );
        } else {
          $this.html(
            '<input type="text" class="edit form-control input-block" value="' +
              data[i] +
              '"/>'
          );
        }
      });
      //ini datanya
    },

    rowSave: function($row) {
      var _self = this,
        $actions,
        values = [];

      if ($row.hasClass("adding")) {
        this.$addButton.removeAttr("disabled");
        $row.removeClass("adding");
      }

      values = $row.find("td").map(function() {
        var $this = $(this);

        if ($this.hasClass("actions")) {
          _self.rowSetActionsDefault($row);
          return _self.datatable.cell(this).data();
        } else {
          return $.trim($this.find("input").val());
        }
      });

      this.datatable.row($row.get(0)).data(values);

      $actions = $row.find("td.actions");
      if ($actions.get(0)) {
        this.rowSetActionsDefault($row);
      }

      this.datatable.draw();
    },

    rowRemove: function($row) {
      if ($row.hasClass("adding")) {
        this.$addButton.removeAttr("disabled");
      }

      this.datatable
        .row($row.get(0))
        .remove()
        .draw();
    },

    rowSetActionsEditing: function($row) {
      $row.find(".on-editing").removeClass("hidden");
      $row.find(".on-default").addClass("hidden");
    },

    rowSetActionsDefault: function($row) {
      $row.find(".on-editing").addClass("hidden");
      $row.find(".on-default").removeClass("hidden");
    }
  };

  $(function() {
    EditableTable.initialize();
  });
}.apply(this, [jQuery]));
