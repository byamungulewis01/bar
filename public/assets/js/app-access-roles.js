"use strict";
$(function(){
  var e,
  a=$(".datatables-users"),
  l={
    1:{
      title:"Pending",
      class:"bg-label-warning"
    },
    2:{
      title:"Active",
      class:"bg-label-success"
    },
    3:{
      title:"Inactive",
      class:"bg-label-secondary"
    }
  },
  i="app-user-view-account.html";
  a.length&&(e=a.DataTable({
    ajax:assetsPath+"json/user-list.json",
    columns:[
      {data:""},
      {data:"full_name"},
      {data:"role"},
      {data:"current_plan"},
      {data:"billing"},
      {data:"status"},
      {data:""}
    ],
    columnDefs:[
      {
        className:"control",
        orderable:!1,
        searchable:!1,
        responsivePriority:2,
        targets:0,
        render:function(e,a,t,s){
          return""
        }
      },
      {
        targets:1,
        responsivePriority:4,
        render:function(e,a,t,s){
          var l=t.full_name,n=t.email,r=t.avatar;
          return'<div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3">'+(r?'<img src="'+assetsPath+"img/avatars/"+r+'" alt="Avatar" class="rounded-circle">':'<span class="avatar-initial rounded-circle bg-label-'+["success","danger","warning","info","primary","secondary"][Math.floor(6*Math.random())]+'">'+(r=(((r=(l=t.full_name).match(/\b\w/g)||[]).shift()||"")+(r.pop()||"")).toUpperCase())+"</span>")+'</div></div><div class="d-flex flex-column"><a href="'+i+'" class="text-body text-truncate"><span class="fw-semibold">'+l+'</span></a><small class="text-muted">@'+n+"</small></div></div>"
        }
      },
      {
        targets:2,
        render:function(e,a,t,s){
          t=t.role;
          return"<span class='text-truncate d-flex align-items-center'>"+{
            Subscriber:'<span class="badge badge-center rounded-pill bg-label-warning me-3 w-px-30 h-px-30"><i class="ti ti-user ti-sm"></i></span>',
            Author:'<span class="badge badge-center rounded-pill bg-label-success me-3 w-px-30 h-px-30"><i class="ti ti-settings ti-sm"></i></span>',
            Maintainer:'<span class="badge badge-center rounded-pill bg-label-primary me-3 w-px-30 h-px-30"><i class="ti ti-chart-pie-2 ti-sm"></i></span>',
            Editor:'<span class="badge badge-center rounded-pill bg-label-info me-3 w-px-30 h-px-30"><i class="ti ti-edit ti-sm"></i></span>',
            Admin:'<span class="badge badge-center rounded-pill bg-label-secondary me-3 w-px-30 h-px-30"><i class="ti ti-device-laptop ti-sm"></i></span>'
          }[t]+t+"</span>"
        }
      },
      {
        targets:3,
        render:function(e,a,t,s){
          return'<span class="fw-semibold">'+t.current_plan+"</span>"
        }
      },
      {
        targets:5,
        render:function(e,a,t,s){
          t=t.status;
          return'<span class="badge '+l[t].class+'" text-capitalized>'+l[t].title+"</span>"
        }
      },
      {
        targets:-1,
        title:"Actions",
        searchable:!1,
        orderable:!1,
        render:function(e,a,t,s){
          return'<div class="d-flex align-items-center"><a href="'+i+'" class="btn btn-sm btn-icon"><i class="ti ti-eye"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;"" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div>'
        }
      }
    ],
    order:[
      [1,"desc"]
    ],
    dom:'<"row mx-2"<"col-sm-12 col-md-4 col-lg-6" l><"col-sm-12 col-md-8 col-lg-6"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center align-items-center flex-sm-nowrap flex-wrap me-1"<"me-3"f><"user_role w-px-200 pb-3 pb-sm-0">>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
    language:{
      sLengthMenu:"Show _MENU_",
      search:"Search",
      searchPlaceholder:"Search.."
    },
    responsive:{
      details:{
        display:$.fn.dataTable.Responsive.display.modal({
          header:function(e){
            return"Details of "+e.data().full_name
          }
        }),
        type:"column",
        renderer:function(e,a,t){
          t=$.map(t,function(e,a){
            return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""
          }).join("");
          return!!t&&$('<table class="table"/><tbody />').append(t)
        }
      }
    },
    initComplete:function(){
      this.api().columns(2).every(function(){
        var a=this,
        t=$('<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>').appendTo(".user_role").on("change",function(){
          var e=$.fn.dataTable.util.escapeRegex($(this).val());
          a.search(e?"^"+e+"$":"",!0,!1).draw()
        });
        a.data().unique().sort().each(function(e,a){
          t.append('<option value="'+e+'" class="text-capitalize">'+e+"</option>")
        })
      })
    }
  })),
  $(".datatables-users tbody").on("click",".delete-record",function(){
    e.row($(this).parents("tr")).remove().draw()
  }),
  setTimeout(()=>{
    $(".dataTables_filter .form-control").removeClass("form-control-sm"),
    $(".dataTables_length .form-select").removeClass("form-select-sm")
  },300)
}),
function(){
  var e=document.querySelectorAll(".role-edit-modal"),
  a=document.querySelector(".add-new-role"),
  b=document.querySelector("#modalRoleName"),
  h=document.querySelector("#is"),
  o=document.querySelectorAll('[type="checkbox"]'),
  t=document.querySelector(".role-title");
  a.onclick=function(){
    t.innerHTML="Add New Role";
    h.value = '0';
  },
  e&&e.forEach(function(e){
    e.onclick=function(event){
      b.value = event.target.attributes[1].value;
      h.value = event.target.attributes[2].value;
      let permissions = event.target.attributes[0].value.split(',');
      o.forEach(e=>{
        e.checked= e.name&&permissions.includes(e.name) ? true : false;
      })
      t.innerHTML="Edit Role"
    }
  })
}();