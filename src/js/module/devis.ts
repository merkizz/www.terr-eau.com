import * as $ from '../utils/dom';

export let init = () => {
    new DevisForm($('[data-role="form-contact"]')[0]);
};

class DevisForm {
    $form: any;
    $name: any;
    $email: any;
    $phoneNumber: any;
    $city: any;
    $message: any;

    constructor(form) {
        this.$form = $(form);
        this.$name = $(this.$form.name);
        this.$email = $(this.$form.email);
        this.$phoneNumber = $(this.$form.phoneNumber);
        this.$city = $(this.$form.city);
        this.$message = $(this.$form.message);

        this.$form.on('submit', (e) => {
            this.validate();
            e.preventDefault();
        });
    }

    validate() {
        if (this.$name.value == "") {
            alert("Vous devez renseigner votre nom");
            this.$name.addClass('error');
            this.$name.focus();
            return false;
        }

        if (this.$email.value == "") {
            alert("Vous devez renseigner votre email");
            this.$email.addClass('error');
            this.$email.focus();
            return false;
        }

        let filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(this.$email.value)) {
            alert("L'adresse email renseignée est invalide");
            this.$email.addClass('error');
            this.$email.focus();
            return false;
        }

        if (this.$phoneNumber.value == "") {
            alert("Vous devez renseigner votre numéro de téléphone");
            this.$city.addClass('error');
            this.$phoneNumber.focus();
            return false;
        }

        if (this.$city.value == "") {
            alert("Vous devez renseigner votre ville");
            this.$city.addClass('error');
            this.$city.focus();
            return false;
        }

        if (this.$message.value == "") {
            alert("Merci de saisir votre demande");
            this.$message.addClass('error');
            this.$message.focus();
            return false;
        }

        return true;
    }
}

init();