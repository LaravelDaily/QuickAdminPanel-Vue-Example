import { AbilityBuilder, Ability } from '@casl/ability'

/**
 * Defines how to detect object's type: https://stalniy.github.io/casl/v4/en/guide/define-rules
 */

const { can, cannot, build } = new AbilityBuilder(Ability)

export default build()
