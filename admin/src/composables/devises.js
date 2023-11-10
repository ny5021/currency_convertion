import { ref } from "vue";
import { devisesFetchAll } from "../services/devises"; 

export function useDevises() {
    const devises = ref(null);
    const error = ref(null);
    const loading = ref(false);

  async function FetchData() {
    loading.value = true
    try {
      const response = await devisesFetchAll()
      devises.value = response
    } catch (err) {
      error.value = err.message
    } finally {
      loading.value = false
    }
  }

  FetchData()

  return { devises, error, loading }
}