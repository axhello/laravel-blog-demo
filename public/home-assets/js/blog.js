$(document).ready(function () {
    $('.ui.form').form({
        fields: {
            name: {
                dentifier: 'name',
                rules: [{
                    type: 'empty',
                    prompt: '请输入用户名!'
                }, {
                    type: 'length[3]',
                    prompt: '用户名至少在3位以上!'
                }]
            },
            email: {
                identifier: 'email',
                rules: [{
                    type: 'empty',
                    prompt: '请输入邮箱!'
                }, {
                    type: 'email',
                    prompt: '请检查邮箱是否正确!'
                }]
            },
            password: {
                identifier: 'password',
                rules: [{
                    type: 'empty',
                    prompt: '请输入您的密码!'
                }, {
                    type: 'length[6]',
                    prompt: '密码长度应大于6位!'
                }]
            },
            password2: {
                identifier: 'password_confirmation',
                rules: [{
                    type: 'match[password]',
                    prompt: '输入的密码与之前的不同!'
                }]
            }
        }
    });
});