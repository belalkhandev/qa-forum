resume_personal_submit_form = function (t, e) {
    const form = $(t).parents('form');
    const action = $(form).attr('action');
    const method = $(form).attr('method');
    const mime = $(form).attr('enctype');
    const btn = $(t).html();
    $(form).one('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
                url: action,
                type: method,
                beforeSend: function () {
                    $(t).attr('disabled', 'disabled');
                    $('.has-error').find('.text-danger').text('');
                    $('.form-control').parent('.has-error').removeClass('has-error');
                    $(t).children().html('<i class="fa fa-spinner fa-spin"></i>');
                },
                data: formData,
                processData: false,
                contentType: false,
                mimeType: mime,
                dataType: 'JSON',
                xhr: function () {
                    //upload Progress
                    let xhr = new window.XMLHttpRequest();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function (event) {
                            //console.log(event);
                            let percent = 0;
                            let position = event.loaded || event.position;
                            let total = event.total;
                            if (event.lengthComputable) {
                                percent = Math.ceil(position / total * 100);
                            }
                            //update progressbar
                            // bar.css("width", +percent + "%");
                            //$(progress_bar_id + " .status").text(percent +"%");
                        }, true);
                    }
                    return xhr;
                },
            }).done(function (ret) {
                // console.log(ret);
                let type = ret.type;
                let title = ret.title;

                if (ret.type == 'success') {
                    $(form)[0].reset();
                }
                Swal.fire({
                    type: type,
                    title: title,
                    text: ret.message,
                    timer: 5000
                }).then(function (res) {
                    $('#personalFormLoad').html('')
                    $('.resume-action').show();
                    $('#personalDetailsLoad').load('/load/personal-details');
                    
                }, function (dismiss) {
                    if (ret.redirect && dismiss === 'timer') {
                        redirect(ret.redirect);
                    }
                });

            })
            .fail(function (res) {
                //errors = JSON.parse(res.responseText);
                errors = res.responseJSON['errors'];
                if (errors) {
                    $.each(errors, function (index, error) {
                        $("[name=" + index + "]").parents('.form-group').find('.text-danger').text(error);
                        $("[name=" + index + "]").parent().addClass('has-error');
                        $(form).find("." + index).text(error);
                    });
                }
            })
            .always(function () {
                $(t).removeAttr('disabled');
                $(t).html(btn);
                // console.log('complete');
                // progress.fadeOut(300);
            });
    });
};

resume_education_submit_form = function (t, e) {
    const form = $(t).parents('form');
    const action = $(form).attr('action');
    const method = $(form).attr('method');
    const mime = $(form).attr('enctype');
    const btn = $(t).html();
    $(form).one('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
                url: action,
                type: method,
                beforeSend: function () {
                    $(t).attr('disabled', 'disabled');
                    $('.has-error').find('.text-danger').text('');
                    $('.form-control').parent('.has-error').removeClass('has-error');
                    $(t).children().html('<i class="fa fa-spinner fa-spin"></i>');
                },
                data: formData,
                processData: false,
                contentType: false,
                mimeType: mime,
                dataType: 'JSON',
                xhr: function () {
                    //upload Progress
                    let xhr = new window.XMLHttpRequest();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function (event) {
                            //console.log(event);
                            let percent = 0;
                            let position = event.loaded || event.position;
                            let total = event.total;
                            if (event.lengthComputable) {
                                percent = Math.ceil(position / total * 100);
                            }
                            //update progressbar
                            // bar.css("width", +percent + "%");
                            //$(progress_bar_id + " .status").text(percent +"%");
                        }, true);
                    }
                    return xhr;
                },
            }).done(function (ret) {
                // console.log(ret);
                let type = ret.type;
                let title = ret.title;

                if (ret.type == 'success') {
                    $(form)[0].reset();
                }
                Swal.fire({
                    type: type,
                    title: title,
                    text: ret.message,
                    timer: 5000
                }).then(function (res) {
                    const current_action = ret.action;
                    if (current_action == 'add-education') {
                        $('.education-items').load("/load/education-items", function() {
                            $('#addEducationForm').prop('disabled', false);
                            $('.education-add-form').html('');
                        });
                    }

                    if (current_action == 'edit-education') {
                        $('.education-items').load("/load/education-items", function() {
                           //after load another actoin
                        });
                    }
                    
                    
                }, function (dismiss) {
                    if (ret.redirect && dismiss === 'timer') {
                        redirect(ret.redirect);
                    }
                });

            })
            .fail(function (res) {
                //errors = JSON.parse(res.responseText);
                errors = res.responseJSON['errors'];
                if (errors) {
                    $.each(errors, function (index, error) {
                        $("[name=" + index + "]").parents('.form-group').find('.text-danger').text(error);
                        $("[name=" + index + "]").parent().addClass('has-error');
                        $(form).find("." + index).text(error);
                    });
                }
            })
            .always(function () {
                $(t).removeAttr('disabled');
                $(t).html(btn);
                // console.log('complete');
                // progress.fadeOut(300);
            });
    });
};


resume_employment_submit_form = function (t, e) {
    const form = $(t).parents('form');
    const action = $(form).attr('action');
    const method = $(form).attr('method');
    const mime = $(form).attr('enctype');
    const btn = $(t).html();
    $(form).one('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
                url: action,
                type: method,
                beforeSend: function () {
                    $(t).attr('disabled', 'disabled');
                    $('.has-error').find('.text-danger').text('');
                    $('.form-control').parent('.has-error').removeClass('has-error');
                    $(t).children().html('<i class="fa fa-spinner fa-spin"></i>');
                },
                data: formData,
                processData: false,
                contentType: false,
                mimeType: mime,
                dataType: 'JSON',
                xhr: function () {
                    //upload Progress
                    let xhr = new window.XMLHttpRequest();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function (event) {
                            //console.log(event);
                            let percent = 0;
                            let position = event.loaded || event.position;
                            let total = event.total;
                            if (event.lengthComputable) {
                                percent = Math.ceil(position / total * 100);
                            }
                            //update progressbar
                            // bar.css("width", +percent + "%");
                            //$(progress_bar_id + " .status").text(percent +"%");
                        }, true);
                    }
                    return xhr;
                },
            }).done(function (ret) {
                // console.log(ret);
                let type = ret.type;
                let title = ret.title;

                if (ret.type == 'success') {
                    $(form)[0].reset();
                }
                Swal.fire({
                    type: type,
                    title: title,
                    text: ret.message,
                    timer: 5000
                }).then(function (res) {
                    const current_action = ret.action;
                    if (current_action == 'add-employment') {
                        $('#employments').load("/load/employment-items", function() {
                            $('#addEmploymentForm').prop('disabled', false);
                            $('#employmentAddContainer').html('');
                        });
                    }

                    if (current_action == 'edit-employment') {
                        $('#employments').load("/load/employment-items", function() {
                           //after load another actoin
                        });
                    }
                    
                    
                }, function (dismiss) {
                    if (ret.redirect && dismiss === 'timer') {
                        redirect(ret.redirect);
                    }
                });

            })
            .fail(function (res) {
                //errors = JSON.parse(res.responseText);
                errors = res.responseJSON['errors'];
                if (errors) {
                    $.each(errors, function (index, error) {
                        $("[name=" + index + "]").parents('.form-group').find('.text-danger').text(error);
                        $("[name=" + index + "]").parent().addClass('has-error');
                        $(form).find("." + index).text(error);
                    });
                }
            })
            .always(function () {
                $(t).removeAttr('disabled');
                $(t).html(btn);
                // console.log('complete');
                // progress.fadeOut(300);
            });
    });
};

resume_skill_submit_form = function (t, e) {
    const form = $(t).parents('form');
    const action = $(form).attr('action');
    const method = $(form).attr('method');
    const mime = $(form).attr('enctype');
    const btn = $(t).html();
    $(form).one('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
                url: action,
                type: method,
                beforeSend: function () {
                    $(t).attr('disabled', 'disabled');
                    $('.has-error').find('.text-danger').text('');
                    $('.form-control').parent('.has-error').removeClass('has-error');
                    $(t).children().html('<i class="fa fa-spinner fa-spin"></i>');
                },
                data: formData,
                processData: false,
                contentType: false,
                mimeType: mime,
                dataType: 'JSON',
                xhr: function () {
                    //upload Progress
                    let xhr = new window.XMLHttpRequest();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function (event) {
                            //console.log(event);
                            let percent = 0;
                            let position = event.loaded || event.position;
                            let total = event.total;
                            if (event.lengthComputable) {
                                percent = Math.ceil(position / total * 100);
                            }
                            //update progressbar
                            // bar.css("width", +percent + "%");
                            //$(progress_bar_id + " .status").text(percent +"%");
                        }, true);
                    }
                    return xhr;
                },
            }).done(function (ret) {
                // console.log(ret);
                let type = ret.type;
                let title = ret.title;

                if (ret.type == 'success') {
                    $(form)[0].reset();
                }
                Swal.fire({
                    type: type,
                    title: title,
                    text: ret.message,
                    timer: 5000
                }).then(function (res) {
                    const current_action = ret.action;
                    if (current_action == 'add-skill') {
                        $('#skills').load("/load/skill-items", function() {
                            $('#addSkillForm').prop('disabled', false);
                            $('#skillAddContainer').html('');
                        });
                    }

                    if (current_action == 'edit-skill') {
                        $('#skills').load("/load/skill-items", function() {
                           //after load another actoin
                        });
                    }
                    
                    
                }, function (dismiss) {
                    if (ret.redirect && dismiss === 'timer') {
                        redirect(ret.redirect);
                    }
                });

            })
            .fail(function (res) {
                //errors = JSON.parse(res.responseText);
                errors = res.responseJSON['errors'];
                if (errors) {
                    $.each(errors, function (index, error) {
                        $("[name=" + index + "]").parents('.form-group').find('.text-danger').text(error);
                        $("[name=" + index + "]").parent().addClass('has-error');
                        $(form).find("." + index).text(error);
                    });
                }
            })
            .always(function () {
                $(t).removeAttr('disabled');
                $(t).html(btn);
                // console.log('complete');
                // progress.fadeOut(300);
            });
    });
};


submit_company_profile_form = function (t, e) {
    const form = $(t).parents('form');
    const action = $(form).attr('action');
    const method = $(form).attr('method');
    const mime = $(form).attr('enctype');
    const btn = $(t).html();
    $(form).one('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
                url: action,
                type: method,
                beforeSend: function () {
                    $(t).attr('disabled', 'disabled');
                    $('.has-error').find('.text-danger').text('');
                    $('.form-control').parent('.has-error').removeClass('has-error');
                    $(t).children().html('<i class="fa fa-spinner fa-spin"></i>');
                },
                data: formData,
                processData: false,
                contentType: false,
                mimeType: mime,
                dataType: 'JSON',
                xhr: function () {
                    //upload Progress
                    let xhr = new window.XMLHttpRequest();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function (event) {
                            //console.log(event);
                            let percent = 0;
                            let position = event.loaded || event.position;
                            let total = event.total;
                            if (event.lengthComputable) {
                                percent = Math.ceil(position / total * 100);
                            }
                            //update progressbar
                            // bar.css("width", +percent + "%");
                            //$(progress_bar_id + " .status").text(percent +"%");
                        }, true);
                    }
                    return xhr;
                },
            }).done(function (ret) {
                // console.log(ret);
                let type = ret.type;
                let title = ret.title;

                if (ret.type == 'success') {
                    $(form)[0].reset();
                }
                Swal.fire({
                    type: type,
                    title: title,
                    text: ret.message,
                    timer: 5000
                }).then(function (res) {
                    const current_action = ret.action;
                    if (current_action == 'add-skill') {
                        $('#skills').load("/load/skill-items", function() {
                            $('#addSkillForm').prop('disabled', false);
                            $('#skillAddContainer').html('');
                        });
                    }

                    if (current_action == 'edit-skill') {
                        $('#skills').load("/load/skill-items", function() {
                           //after load another actoin
                        });
                    }
                    
                    
                }, function (dismiss) {
                    if (ret.redirect && dismiss === 'timer') {
                        redirect(ret.redirect);
                    }
                });

            })
            .fail(function (res) {
                //errors = JSON.parse(res.responseText);
                errors = res.responseJSON['errors'];
                if (errors) {
                    $.each(errors, function (index, error) {
                        $("[name=" + index + "]").parents('.form-group').find('.text-danger').text(error);
                        $("[name=" + index + "]").parent().addClass('has-error');
                        $(form).find("." + index).text(error);
                    });
                }
            })
            .always(function () {
                $(t).removeAttr('disabled');
                $(t).html(btn);
                // console.log('complete');
                // progress.fadeOut(300);
            });
    });
};


/**
 * Redirect to given url
 * @param $url
 * @returns {boolean}
 */
function redirect($url) {
    setTimeout(function () {
        window.location.href = $url;
    }, 200);
    return true;
}

/**
 * Delete Function
 * @param t
 * @param e
 */
function resumeProfileDeleteSwal(t, e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4fa7f3',
        cancelButtonColor: '#d57171',
        confirmButtonText: 'Yes, delete it!'
    }).then(function (stat) {

        if (stat.value != undefined && stat.value) {
            // $(t).parent('form').submit();
            let form = $(t).parents('form'),
                action = $(form).attr('action'),
                method = $(form).attr('method'),
                btn = $(t).html();
            let formData = $(form).serialize();

            $.ajax({
                url: action,
                type: method,
                beforeSend: function () {
                    $(t).attr('disabled', 'disabled');
                    $('#personalDetailsLoad').html('');
                },
                data: formData,
                dataType: 'JSON',
                success: function (res) {
                    let type = res.type;
                    let title = res.title;
                    if (res.type == 'success') {
                        $('#personalDetailsLoad').load('/load/personal-details');
                    }
                    swal.fire(
                        title,
                        res.msg,
                        type
                    );
                },
                complete: function () {
                    $(t).removeAttr('disabled');
                }
            });
        }

    });
}

/**
 * Delete Function
 * @param t
 * @param e
 */
function resumeEducationDeleteSwal(t, e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4fa7f3',
        cancelButtonColor: '#d57171',
        confirmButtonText: 'Yes, delete it!'
    }).then(function (stat) {

        if (stat.value != undefined && stat.value) {
            // $(t).parent('form').submit();
            let form = $(t).parents('form'),
                action = $(form).attr('action'),
                method = $(form).attr('method'),
                btn = $(t).html();
            let formData = $(form).serialize();

            $.ajax({
                url: action,
                type: method,
                beforeSend: function () {
                    $(t).attr('disabled', 'disabled');
                },
                data: formData,
                dataType: 'JSON',
                success: function (res) {
                    let type = res.type;
                    let title = res.title;
                    if (res.type == 'success') {
                        $(t).closest('.education-item').remove();
                    }
                    swal.fire(
                        title,
                        res.msg,
                        type
                    );
                },
                complete: function () {
                    $(t).removeAttr('disabled');
                }
            });
        }

    });
}

/**
 * Delete Function
 * @param t
 * @param e
 */
function resumeEmploymentDeleteSwal(t, e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4fa7f3',
        cancelButtonColor: '#d57171',
        confirmButtonText: 'Yes, delete it!'
    }).then(function (stat) {

        if (stat.value != undefined && stat.value) {
            // $(t).parent('form').submit();
            let form = $(t).parents('form'),
                action = $(form).attr('action'),
                method = $(form).attr('method'),
                btn = $(t).html();
            let formData = $(form).serialize();

            $.ajax({
                url: action,
                type: method,
                beforeSend: function () {
                    $(t).attr('disabled', 'disabled');
                },
                data: formData,
                dataType: 'JSON',
                success: function (res) {
                    let type = res.type;
                    let title = res.title;
                    if (res.type == 'success') {
                        $(t).closest('.employment-item').remove();
                    }
                    swal.fire(
                        title,
                        res.msg,
                        type
                    );
                },
                complete: function () {
                    $(t).removeAttr('disabled');
                }
            });
        }

    });
}

/**
 * Delete Function
 * @param t
 * @param e
 */
function resumeSkillDeleteSwal(t, e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4fa7f3',
        cancelButtonColor: '#d57171',
        confirmButtonText: 'Yes, delete it!'
    }).then(function (stat) {

        if (stat.value != undefined && stat.value) {
            // $(t).parent('form').submit();
            let form = $(t).parents('form'),
                action = $(form).attr('action'),
                method = $(form).attr('method'),
                btn = $(t).html();
            let formData = $(form).serialize();

            $.ajax({
                url: action,
                type: method,
                beforeSend: function () {
                    $(t).attr('disabled', 'disabled');
                },
                data: formData,
                dataType: 'JSON',
                success: function (res) {
                    let type = res.type;
                    let title = res.title;
                    if (res.type == 'success') {
                        $(t).closest('.skill-item').remove();
                    }
                    swal.fire(
                        title,
                        res.msg,
                        type
                    );
                },
                complete: function () {
                    $(t).removeAttr('disabled');
                }
            });
        }

    });
}
