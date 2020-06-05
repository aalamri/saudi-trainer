export default class Gate{

    constructor(user){
        this.user = user;
    }


    isAdmin(){
        return this.user.type === 'admin';
    }

    isUser(){
        return this.user.type === 'user';
    }
    // isAdminOrTrainer(){
    //     if(this.user.type === 'admin' || this.user.type === 'trainer'){
    //         return true;
    //     }

    // }
    // isTrainerOrUser(){
    //     if(this.user.type === 'user' || this.user.type === 'trainer'){
    //         return true;
    //     }

    // }

}

