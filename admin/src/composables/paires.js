import { ref } from "vue";
import { pairesFetchOne, pairesFetchAll } from "../services/devises"; 

export function usePaires() {
  const paires = ref(null);
  const error = ref(null);
  const loading = ref(false);

  async function FetchData() {
    loading.value = true
    try {
      const response = await pairesFetchAll()
      paires.value = response
    } catch (err) {
      error.value = err.message
    } finally {
      loading.value = false
    }
  }

  FetchData()

  return { paires, error, loading }
}

export function usePairesConverter(from_devise, to_devise, value) {
    const valueConverted = ref(null);
    const errorPaires = ref(null);

  async function FetchData() {
    try {
      const response = await pairesFetchOne(from_devise, to_devise)
      valueConverted.value = valueConverted.value * response
      console.log(valueConverted);
    } catch (err) {
      errorPaires.value = err.message
    }
  }

  FetchData()
  
  return { valueConverted }
}