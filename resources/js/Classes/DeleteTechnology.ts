import {DeleteEvent} from "@/Interfaces/DeleteEvent";
import {DeleteService} from "@/Services/DeleteService";

export class DeleteTechnology implements DeleteEvent {
    delete(url: string) {
        let deleteService = new DeleteService()
        deleteService.delete(url)
    }
}

export default {
    DeleteTechnology
}
