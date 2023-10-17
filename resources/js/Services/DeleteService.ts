import {DeleteEvent} from "@/Interfaces/DeleteEvent.js";
import Swal from "sweetalert2";
import axios from "axios";

export class DeleteService implements  DeleteEvent {
    type(url: string, deleteEvent: DeleteEvent) {
        return deleteEvent.delete(url);
    }

    delete(url: string) {
        Swal.fire({
            title: 'Estás seguro que deseas eliminarlo?',
            text: "No podrás revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'cancelar',
            confirmButtonText: 'Sí, eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(url).then((result) => {
                    if (result.data) {
                        Swal.fire(
                            'Elminado!',
                            'La tecnología ha sido eliminada.',
                            'success'
                        ).then(() => {
                            location.reload()
                        })
                    }
                })
            }
        })
    }
}

export default  {
    DeleteService
}
